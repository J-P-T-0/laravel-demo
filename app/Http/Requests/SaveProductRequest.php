<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class SaveProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'price' => 'required|decimal:0,2',
            'stock' => 'required|numeric',
            'description' => 'nullable|string|min:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];
    }

    public function handleCreation()
    {
        $data = $this->validated(); // Obtener datos validados

        // Manejar la carga de la imagen
        if ($this->hasFile('image')) {
            $image = time() . '_' . $this->file('image')->getClientOriginalName();
            $data['image'] = $this->file('image')->storeAs('image', $image, 'public'); // Guardar la imagen en 'public/image'
        } else {
            $data['image'] = null; // Si no hay imagen
        }

        return $data;
    }

    public function handleUpdate()
    {
        $data = $this->validated(); // Obtener datos validados

        // Manejar la carga de la imagen
        if ($this->hasFile('image')) {
            if ($data['image'] != null) {
                Storage::delete('public/' . $data['image']);
            }

            // Guardar la nueva imagen y obtener la ruta
            $image = time() . '_' . $this->file('image')->getClientOriginalName();
            $data['image'] = $this->file('image')->storeAs('image', $image, 'public');
        }

        return $data;
    }
}
