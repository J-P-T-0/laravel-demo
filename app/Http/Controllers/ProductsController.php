<?php



namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Contracts\View\View;



class ProductsController extends Controller
{
    public function index() : view
    {
        return view('products.index',['products' => Products::all()]);
    }

    public function search(Request $request) : view
    {
        $query = $request->input('query');

        $products = Products::where('name', 'like', "%$query%")->get();

        return view('products.search', compact('products', 'query'));
    }

    public function category(string $query) : view
    {
        $products = Products::where('category', 'like', "%$query%")->get();

        return view('products.category', compact('products', 'query'));
    }

    public function display($id) : view
    {
        // Encuentra el producto por su ID
        $product = Products::findOrFail($id);

        return view('products.display', compact('product'));
    }
    public function dashboard()
    {
        if(auth()->user()->role == 'admin'){
            $products = Products::simplePaginate(20);
            return view('products.control.dashboard',compact('products'));
        }
        return redirect()->route('products.index',['products' => Products::all()]);
    }
    public function create()
    {
        if(auth()->user()->role == 'admin'){
            return view('products.control.create');
        }
        return redirect()->route('products.index',['products' => Products::all()]);
    }

    public function store(SaveProductRequest $request)
    {
        if(auth()->user()->role == 'admin'){
            $data = $request->handleCreation();
            $producto = Products::create($data);
            return redirect()->route('products.control.show', $producto)->with('status', 'Producto Almacenado');
        }
        return redirect()->route('products.index',['products' => Products::all()]);
    }

    public function show(Products $product)
    {
        if(auth()->user()->role == 'admin'){
            return view('products.control.show', compact('product'));
        }
        return redirect()->route('products.index',['products' => Products::all()]);
    }

    public function edit(Products $product)
    {
        if(auth()->user()->role == 'admin'){
            return view('products.control.edit', compact('product'));
        }
        return redirect()->route('products.index',['products' => Products::all()]);
    }

    public function update(SaveProductRequest $request, Products $product)
    {
        if(auth()->user()->role == 'admin'){
            $data = $request->handleUpdate();
            $product->update($data);

            return redirect()->route('products.control.show', $product)->with('status', 'Producto Actualizado');
        }
        return redirect()->route('products.index',['products' => Products::all()]);
    }

    public function destroy(Products $product)
    {
        if(auth()->user()->role == 'admin'){
            $product->delete();
            return redirect()->route('products.control.dashboard')->with('status', 'Producto Eliminado');
        }
        return redirect()->route('products.index',['products' => Products::all()]);
    }
}

