<div class="item-card w-100">
<div>
    <a href="{{ route('products.display', ['product' => $product->id]) }}" class="w-100 d-flex">
        @if ($product->image)
            <img class="item-img mx-auto my-3" src="{{ asset('storage/' . $product->image) }}" alt="Imagen del producto">
        @else
            <img class="item-img mx-auto my-3" src="{{ asset('storage/image/default.png') }}" alt="Default">
        @endif
    </a>
</div>
<div class="item-info">
    <h4 class="item-name me-auto mb-0 ps-2">{{ $product->name }}</h4>
    <p class="item-category me-auto mt-0 ps-2 mb-auto">{{ $product->category }}</p>
    <p class="item-price me-auto ps-2">${{ $product->price }}</p>
    <small class="text-muted me-auto ps-2">Disponible: {{ $product->stock }} {{ $product->stock === 1 ? 'unidad' : 'unidades' }}</small>
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
        <button class="btn btn-secondary w-100 rounded-top-0 mt-auto" style="height: 50px; line-height: 1;" disabled><i class="bi bi-cart-dash h4"></i></button>
    @endif
</div>

</div>

