<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploaderController extends Controller
{
    public function index(){
        Storage::put('test.txt', 'Hello World');
    }
}
