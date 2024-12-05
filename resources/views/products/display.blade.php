<x-layout>
    <div class="container-fluid">
        <a class="btn btn-dark btn-lg my-2" href="{{url()->previous() !== url()->current() ? url()->previous() : route('products.index')}}"><i class="bi-arrow-left-circle fs-4 text-warning"></i> Regresar</a>
        <div class="d-flex flex-column justify-content-center w-75 mx-auto p-0">

        <div class="row align-items-center justify-content-evenly p-0 m-0 border border-3 rounded-3">
            <div class="col-8 col-md-5 px-0 py-4 d-flex justify-content-center">
                @if ($product->image)
                    <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="Imagen del producto">
                @else
                    <img class="img-fluid" src="{{ asset('storage/image/default.png') }}" alt="Imagen por defecto">
                @endif
            </div>
            <div class="col-md-5">
                <h1 class="item-name" style="font-size: 3.5rem">{{ $product->name }}</h1>
                <p class="item-desc" style="font-size: 1.8rem;color: #707278">{{ $product->description }}</p>
                <p class="item-price" style="font-size: 2.5rem">${{ $product->price }}</p>
                <p class="text-muted d-block mt-2" style="font-size: 1.2rem">
                    Disponible: {{ $product->stock }} {{ $product->stock === 1 ? 'unidad' : 'unidades' }}
                </p>
                @if ($product->stock > 0)
                    <form method="POST" action="{{ route('cart.agregar', $product) }}" class="item-controls mb-0">
                        @csrf
                        <button class="down-btn btn btn-secondary" type="button" disabled="disabled"><i class="bi bi-dash-lg h4"></i></button>
                        <input
                            type="number"
                            name="cantidad"
                            min="1"
                            max="{{ $product->stock }}"
                            value="1"
                            readonly
                            class="form-control rounded-0 m-0 number-input text-center w-25"
                            style="background-color: #f8f8f8"
                        >
                        <button class="up-btn btn btn-secondary" type="button"><i class="bi bi-plus-lg h4"></i></button>


                        <button type="submit" class="btn btn-warning btn-cart" >
                            <i class="bi bi-cart h4"></i>
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary w-100 mb-3" disabled>Sin stock</button>
                @endif
            </div>
        </div>
    </div>
    </div>
</x-layout>
