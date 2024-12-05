@csrf

<label for="name">Nombre del Producto</label>
<input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name ?? '') }}">

<label for="price">Precio</label>
<input type="text" class="form-control" name="price" id="price" value="{{ old('price', $product->price ?? '') }}">

<label for="stock">Stock</label>
<input type="text" class="form-control" name="stock" id="stock" value="{{ old('stock', $product->stock ?? '') }}">

<label for="image">Imagen:</label>
@if($product->image ?? '')
    <br><img src="{{ asset('storage/' . $product->image) }}" alt="Imagen del Producto" width="200" class="my-2 rounded border border-3 border-dark">
@else
    <p>No hay imagen disponible.</p>
@endif
<input type="file" class="form-control" name="image" id="image">

<label for="description">Descripción</label>
<textarea name="description" class="form-control" style="height: 20vh" id="description">{{ old('description', $product->description ?? '') }}</textarea>

<button class="btn btn-warning mt-2">Save</button>

