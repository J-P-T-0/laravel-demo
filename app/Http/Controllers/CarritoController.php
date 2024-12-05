<?php

namespace App\Http\Controllers;

use App\Models\Cartitem;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tienda.index',['cart'=>Cartitem::where()]);
    }
}
