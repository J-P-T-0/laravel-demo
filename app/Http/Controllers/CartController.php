<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        // Obtener el carrito del usuario autenticado
        $cart = Auth::user()->cart;

        // Calcular si el carrito está vacío
        $empty = !$cart || $cart->items->isEmpty();

        // Si el carrito está vacío, solo se pasa esta información a la vista
        if ($empty) {
            return view('cart.index', ['cart' => $cart, 'empty' => true]);
        }

        // Si el carrito tiene elementos, calculamos subtotales, IVA y total
        $subtotal = $cart->items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        $envio = 250; // 16% de IVA
        $total = $subtotal + $envio;

        // Pasar datos a la vista
        return view('cart.index', compact('cart', 'subtotal', 'envio', 'total', 'empty'));
    }

    public function agregar(Request $request, Products $product)
    {
        // Validar la cantidad
        $request->validate(['cantidad' => 'integer|min:1']);

        // Verificar que el stock sea suficiente
        if ($product->stock < $request->cantidad) {
            return redirect()->back()->with('error', 'No hay suficiente stock disponible para este producto.');
        }

        // Obtener el carrito del usuario actual o crear uno si no existe
        $carrito = Auth::user()->cart ?? Cart::create([
            'user_id' => Auth::id()
        ]);

        // Buscar si el producto ya está en el carrito
        $itemCarrito = CartItem::where('cart_id', $carrito->id)
            ->where('product_id', $product->id)
            ->first();

        // Calcular la cantidad total que se intentaría agregar
        $totalQuantity = $itemCarrito
            ? $itemCarrito->quantity + $request->cantidad
            : $request->cantidad;

        // Verificar si la cantidad total excede el stock
        if ($totalQuantity > $product->stock) {
            return redirect()->back()->with('error', 'No puede agregar más productos de los disponibles en stock.');
        }

        // Si el producto ya está en el carrito, incrementar la cantidad
        if ($itemCarrito) {
            $itemCarrito->update([
                'quantity' => $totalQuantity
            ]);
        } else {
            // Si no está en el carrito, crear un nuevo ítem de carrito
            CartItem::create([
                'cart_id' => $carrito->id,
                'product_id' => $product->id,
                'quantity' => $request->cantidad,
                'price' => $product->price,
            ]);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('cart.index')
            ->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request, $itemId)
    {

        // Buscar el item en el carrito
        $cartItem = CartItem::find($itemId);

        // Verificar si la cantidad es válida
        $newQuantity = $request->input('quantity');

        if ($newQuantity < 1) {
            return back()->with('error', 'La cantidad no puede ser menor a 1.');
        }

        // Actualizar la cantidad
        $cartItem->quantity = $newQuantity;
        $cartItem->save();

        return back()->with('success', '¡Producto Actualizado!');
    }

    public function remove(Cartitem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Producto Eliminado');
    }

}
