<x-layout>
    <div class="container-lg py-8">
        <h1 class="text-3xl font-bold mb-6">Carrito de Compras</h1>
        @if(!auth()->check())
            <p>Inicia sesión para ver tu carrito.</p>
        @else
            @if($empty)
                <div class="bg-gray-100 p-4 rounded">
                    <p class="text-center text-gray-600">Tu carrito está vacío</p>
                    <div class="text-center mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            Continuar Comprando
                        </a>
                    </div>
                </div>
            @else
                <div class="row">
                    <!-- Lista de Productos en el Carrito -->
                    <div class="col-md-8">
                        @foreach($cart->items as $item)
                            <div class="d-flex justify-content-around align-items-center bg-white shadow rounded-lg p-3 mb-3"
                                 style="{{ $item->product->stock == 0 ? 'background-color: #f0f0f0;' : '' }}">
                                <!-- Imagen del Producto -->
                                <div class="col-md-3">
                                    @if ($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}"
                                             alt="{{ $item->product->name }}"
                                             class="item-img" style="height: clamp(80px,20vw,150px); object-fit: cover;">
                                    @else
                                        <img src="{{ asset('storage/image/default.png') }}"
                                             alt="Imagen por defecto"
                                             class="img-fluid rounded" style="height: 80px; object-fit: cover;">
                                    @endif
                                </div>

                                <!-- Descripción y Cantidad del Producto -->
                                <div class="col-md-5 col-lg-6">
                                    <h5 class="font-weight-bold">{{ $item->product->name }}</h5>
                                    <p class="text-muted mb-1 d-none d-sm-inline">{{ $item->product->description }}</p>
                                    <p class="text-muted mb-1">${{ number_format($item->product->price, 2) }}</p>
                                    <p class="text-black mb-1">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                </div>

                                <!-- Input de Cantidad y Botones de + y - -->
                                <div class="col-4 col-md-4 col-lg-3 p-0 border border-info">
                                    <div class="w-100 border border-warning">
                                        <form method="POST" action="{{ route('cart.update', $item->id) }}" class="item-controls cart-update mb-2 w-100 p-0 m-0 border border-danger">
                                            @csrf
                                            @method('PATCH')
                                            <button class="down-btn btn btn-secondary rounded-start w-25" type="submit" {{ $item->quantity === 1 ? 'disabled' : '' }}>
                                                <i class="bi bi-dash-lg h4"></i>
                                            </button>

                                            <input
                                                type="number"
                                                name="quantity"
                                                min="1"
                                                max="{{ $item->product->stock }}"
                                                value="{{ $item->quantity }}"
                                                readonly
                                                class="form-control rounded-0 m-0 number-input text-center w-50"
                                                style="background-color: #f8f8f8"
                                            >

                                            <button class="up-btn btn btn-secondary rounded-end w-25 m-0" type="submit" {{ $item->quantity === $item->product->stock ? 'disabled' : '' }}>
                                                <i class="bi bi-plus-lg h4"></i>
                                            </button>

                                        </form>
                                    </div>

                                    <!-- Botón Eliminar Producto -->
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-flex w-100 justify-content-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-50"><i class="bi bi-trash3-fill h-3"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Resumen de Compra -->
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Resumen</h4>
                            </div>
                            <div class="panel-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <span id="subtotal">${{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Envío</span>
                                    <span id="iva">${{ number_format($envio, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between font-weight-bold border-top pt-2">
                                    <span>Total</span>
                                    <span id="total">${{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>

</x-layout>
