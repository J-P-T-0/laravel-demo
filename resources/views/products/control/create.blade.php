<x-layout>

<h1>Nuevo Producto</h1>

<x-errors/>

<div class="container-fluid p-4 mt-3" style="background-color: rgba(83,73,55,0.34)">
    <form method="post" action="{{ route('products.control.store') }}" enctype="multipart/form-data">
        <x-products.form/>
    </form>
</div>


</x-layout>
