<x-layout>

    <h1 style="font-size: 4rem">Productos</h1>

    <div class="container-fluid px-5">
        <div class="row row-cols-1 row-cols-md-3 row-cols-xxl-5 g-5 mb-5">
            @foreach ($products as $product)
                <div class="col">
                    <x-products.item :product="$product"/>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
