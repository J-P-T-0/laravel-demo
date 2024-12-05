<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UploaderController;

Route::get('/uploader', [UploaderController::class, 'index']);

Route::get('/', function () {
    $protein = App\Models\Products::where('category','proteína')->inRandomOrder()->take(4)->get();
    $preworkout = App\Models\Products::where('category','pre-entreno')->inRandomOrder()->take(4)->get();
    $creatina = App\Models\Products::where('category','creatina')->inRandomOrder()->take(4)->get();
    return view('home', compact('protein','preworkout','creatina'));
})->name('home');

Route::controller(ProductsController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/p/search', 'search')->name('search');

        Route::get('/category/{product}', 'category')->name('category');

        Route::get('/display/{product}', 'display')->name('display');
    });

Route::middleware(['auth'])
    ->controller(ProductsController::class)
    ->prefix('products/control')
    ->name('products.control.')
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');

        Route::get('/create', 'create')->name('create');

        Route::post('/store', 'store')->name('store');

        Route::get('/{product}', 'show')->name('show');

        Route::get('/{product}/edit', 'edit')->name('edit');

        Route::patch('/{product}', 'update')->name('update');

        Route::delete('/{product}', 'destroy')->name('destroy');
    });

use App\Http\Controllers\SatisfactionController;//Sentencia de enrutador satisfaction

Route::controller(SatisfactionController::class)
    ->prefix('satisfaction')
    ->name('satisfaction.')
    ->group(function () {

        Route::get('/', 'index')->name('index');

        Route::post('/store', 'store')->name('store');

    });

//Seccion de login
use App\Http\Controllers\AuthController;
Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.submit');
        Route::get('/register', 'showRegisterForm')->name('register');
        Route::post('/register', 'register')->name('register.submit');
        Route::post('/logout', 'logout')->name('logout');
});

use App\Http\Controllers\CartController;

Route::middleware(['auth'])
    ->controller(CartController::class)
    ->prefix('cart')
    ->name('cart.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/agregar/{product}', 'agregar')->name('agregar');
        Route::patch('/actualizar/{cartItem}', 'update')->name('update');
        Route::delete('/eliminar/{cartItem}', 'remove')->name('remove');
});

//Codigo de enrutacion para el editor de datos
use App\Http\Controllers\PerfilController;

Route::middleware(['auth'])
    ->controller(PerfilController::class)
    ->prefix('perfil')
    ->name('perfil.')
    ->group(function () {
        Route::get('/', 'edit')->name('edit'); // Mostrar los datos actuales
        Route::post('/update/{field}', 'update')->name('update'); // Actualizar un campo específico
        Route::post('/updateAddress/{field}', 'updateAddress')->name('updateAddress');
    });


use App\Http\Controllers\PaymentController;

Route::middleware(['auth'])
    ->controller(PaymentController::class)
    ->prefix('payment')->name('payment.')
    ->group(function () {
    Route::post('/processPayment', 'processPayment')->name('processPayment');
    Route::get('/','index')->name('index');
    Route::get('/addCustomer','addCustomer')->name('addCustomer');
});



