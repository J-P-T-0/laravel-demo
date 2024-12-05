<x-layout>
    <div class="container-md">
        <h1 class="p-5 ms-5">Registro</h1>
        <x-errors></x-errors>
        <form action="{{ route('register.submit') }}" method="POST" class="col-10 col-lg-8 mx-auto">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Teléfono</label>
                <input type="tel" name="phone_number" class="form-control" id="phone_number" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="postal_code" class="form-label">Código postal</label>
                <input type="text" name="postal_code" class="form-control" id="postal_code" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">Estado</label>
                <input type="text" name="state" class="form-control" id="state" aria-describedby="emailHelp" required/>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Ciudad</label>
                <input type="text" name="city" class="form-control" id="city" aria-describedby="emailHelp" required/>
            </div>

            <button type="submit" class="btn btn-warning">Registrarse</button>
        </form>
    </div>

</x-layout>
