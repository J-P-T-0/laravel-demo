<x-layout>
    <a href="{{route('products.control.create')}}" class="btn btn-warning">Nuevo producto</a>
    <div class="container-fluid px-5 d-flex flex-column align-items-center">
        <table class="table table-striped table-sm" style="font-size: 1.5rem">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoría</th>
                <th scope="col">Imagen</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->category}}</td>
                    <td>
                        @if ($product->image)
                            <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="Imagen del producto" style="width: 70px">
                        @else
                            <img class="card-img-top" src="{{ asset('storage/image/default.png') }}" alt="Imagen por defecto" style="width: 70px">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.control.edit', $product->id) }}" class="btn btn-primary my-2"><i class="bi bi-pencil h4"></i></a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('products.control.destroy', $product) }}" class="d-flex justify-content-around">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger my-2" ><i class="bi bi-trash3 h4"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mb-5">
            {{ $products->links() }}
        </div>

    </div>


</x-layout>
