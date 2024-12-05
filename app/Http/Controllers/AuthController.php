<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|regex:/^[0-9]{10,15}$/|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|min:10|max:255',
            'postal_code' => 'required|string|regex:/^[0-9]{5}$/',
            'state' => 'required|string|min:1|max:255',
            'city' => 'required|string|min:1|max:255',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);

        Cart::create([
            'user_id' => $user->id,
            'total_price' => 0
        ]);

        Shipment::create([
           'user_id' => $user->id,
           'address' => $validated['address'],
           'postal_code' => $validated['postal_code'],
           'state' => $validated['state'],
           'city' => $validated['city'],
        ]);
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

