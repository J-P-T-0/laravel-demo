<x-layout>
    <div class="card flex" style="width:250px">
        @if ($product->image)
            <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="Imagen del producto">
        @else
            <img class="card-img-top" src="{{ asset('storage/image/default.png') }}" alt="Imagen por defecto">
        @endif
        <div class="card-body">
            <h4 class="card-title">{{ $product->name }}</h4>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">{{ $product->price }}</p>
            <p class="card-text">{{ $product->stock }}</p>

            <form method="post" action="{{ route('products.control.destroy', $product) }}" class="d-flex justify-content-around">
                @csrf
                @method('DELETE')
                <a href="{{ route('products.control.edit', $product->id) }}" class="btn btn-primary my-2">Editar</a>
                <button class="btn btn-primary my-2" >Eliminar</button>
            </form>

        </div>
    </div>

<a href="{{route('products.index')}}" class="btn btn-primary my-2">Menú Principal</a><br>

</x-layout>
