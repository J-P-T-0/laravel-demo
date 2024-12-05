<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atencion;

class SatisfactionController extends Controller
{
    public function index(){
        return view('satisfaction.atencion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'atencion' => 'required|integer|between:1,10',
            'calidad' => 'required|integer|between:1,10',
            'recomendacion' => 'required|integer|between:1,10',
            'experiencia' => 'required|integer|between:1,10',
            'facilidad' => 'required|integer|between:1,10',
            'comentarios' => 'nullable|string|max:200',
        ]);

        Atencion::create([
            'atencion' => $request->atencion,
            'calidad' => $request->calidad,
            'recomendacion' => $request->recomendacion,
            'experiencia' => $request->experiencia,
            'facilidad' => $request->facilidad,
            'comentarios' => $request->comentarios,
        ]);

        return redirect()->back()->with('success', 'Gracias por completar la encuesta.');
    }
}
