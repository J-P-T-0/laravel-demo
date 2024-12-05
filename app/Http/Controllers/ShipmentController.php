<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{
    public function update(Request $request, $field)
    {
        $request->validate([
            'value' => match ($field) {
                'address' => 'required|string|min:10|max:255',
                'postal_code' => 'required|string|regex:/^[0-9]{5}$/',
                'state' => 'required|string|min:1|max:255',
                'city' => 'required|string|min:1|max:255',
                default => throw new \InvalidArgumentException('Campo no válido'),
            }
        ]);

        $address = Shipment::user();
        $address->update([
            $field => $request->get('value1'),
        ]);

        return redirect()->route('perfil.edit')->with('success', 'Datos actualizados correctamente');
    }
}
