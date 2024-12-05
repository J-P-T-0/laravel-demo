<x-layout>
    <div class="container-md">
        <h1 class="ms-5 p-5">Login</h1>
        <div>
            <x-errors></x-errors>
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="col-8 col-lg-5 mx-auto">
            @csrf

            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" required/>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" name="password" required/>
            </div>
            <div class="text-end">
                <a href="{{ route('register') }}"><button type="button" class="btn btn-secondary me-2">Registro</button></a>
                <button type="submit" class="btn btn-warning">Iniciar sesión</button>
            </div>
        </form>

    </div>

</x-layout>
