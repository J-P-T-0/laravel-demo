<x-layout>
    <div class="container-fluid">
        <h1>Resultados de la Búsqueda</h1>
        <h3><strong>{{ $query }}</strong></h3>

            @if ($products->isEmpty())
                <p style="font-size: 2rem">No se encontraron productos.</p>
            @else
            <div class="row row-cols-1 row-cols-md-3 row-cols-xxl-5 g-5 mb-5">
                @foreach ($products as $product)
                    <div class="col">
                        <x-products.item :product="$product"/>
                    </div>
                @endforeach
            </div>
            @endif
    </div>
</x-layout>
