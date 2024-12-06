<x-layout>
    <div class="container-fluid w-100 p-0 m-0" style="height: 91vh;background-image: url('{{asset('storage/image/fondo1.jpg')}}'); background-position: center;overflow-x: hidden">
        <div class="container-fluid w-100 h-100 m-0 d-flex justify-content-center align-items-center" style="background-color: rgba(0,0,0,0.6)">
            <h1 class="text-light home">Gym Supplements</h1>
            <h2></h2>
        </div>
    </div>

    <div class="container-md" style="overflow-x: hidden">
        <h1 style="font-size: 3.5rem">Proteínas</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5 mb-5">
            @foreach ($protein as $product)
                <div class="col">
                    <x-products.item :product="$product"/>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-md" style="overflow-x: hidden">
        <h1 style="font-size: 3.5rem">Pre-Workout</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5 mb-5">
            @foreach ($preworkout as $product)
                <div class="col">
                    <x-products.item :product="$product"/>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-md" style="overflow-x: hidden">
        <h1 style="font-size: 3.5rem">Creatina</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5 mb-5">
            @foreach ($creatina as $product)
                <div class="col">
                    <x-products.item :product="$product"/>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>

