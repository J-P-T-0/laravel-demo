<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('perfil.index', compact('user'));
    }

    public function update(Request $request, $field)
    {
        $request->validate([
            'value' => match ($field) {
                'name', 'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|regex:/^[0-9]{10,15}$/',
                'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
                'password' => 'required|string|min:8|confirmed',
                default => throw new \InvalidArgumentException('Campo no válido'),
            },
        ]);

        $user = Auth::user();
        $user->update([
            $field => $request->get('value'),
        ]);

        return redirect()->route('perfil.edit')->with('success', 'Datos actualizados correctamente');
    }

    public function updateAddress(Request $request, $field)
    {
        $request->validate([
            'value1' => match ($field) {
                'address' => 'required|string|min:10|max:255',
                'postal_code' => 'required|string|regex:/^[0-9]{5}$/',
                'state' => 'required|string|min:1|max:255',
                'city' => 'required|string|min:1|max:255',
                default => throw new \InvalidArgumentException('Campo no válido'),
            }
        ]);

        $address = Auth::user()->address();
        $address->update([
            $field => $request->get('value1'),
        ]);

        return redirect()->route('perfil.edit')->with('success', 'Datos actualizados correctamente');
    }
}
