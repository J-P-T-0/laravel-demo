<x-layout>

<h1>{{$product->name}}</h1>

<x-errors />

    <div class="container-fluid p-4 mt-3" style="background-color: rgba(83,73,55,0.34)">
        <form method="post" action="{{ route('products.control.update', $product) }}" enctype="multipart/form-data">
            @method('PATCH')

            <x-products.form :product="$product"/>

        </form>
    </div>

</x-layout>
