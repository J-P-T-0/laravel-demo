<x-layout>
    <div class="container mt-5">
        <h1>Editar Perfil</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Nombre</td>
                <td>{{ $user->name }}</td>
                <td>
                    <form action="{{ route('perfil.update', 'name') }}" method="POST" class="d-md-flex align-items-center">
                        @csrf
                        <input type="text" name="value" class="form-control" value="{{ $user->name }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td>{{ $user->last_name }}</td>
                <td>
                    <form action="{{ route('perfil.update', 'last_name') }}" method="POST" class="d-md-flex align-items-center">
                        @csrf
                        <input type="text" name="value" class="form-control" value="{{ $user->last_name }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td>{{ $user->phone_number }}</td>
                <td>
                    <form action="{{ route('perfil.update', 'phone_number') }}" method="POST" class="d-md-flex align-items-center">
                        @csrf
                        <input type="text" name="value" class="form-control" value="{{ $user->phone_number }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('perfil.update', 'email') }}" method="POST" class="align-items-center d-md-flex">
                        @csrf
                        <input type="email" name="value" class="form-control" value="{{ $user->email }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Dirección</td>
                <td>{{ $user->address->address }}</td>
                <td>
                    <form action="{{ route('perfil.updateAddress', 'address') }}" method="POST" class="d-md-flex align-items-center">
                        @csrf
                        <input type="text" name="value1" class="form-control" value="{{ $user->address->address }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Código postal</td>
                <td>{{ $user->address->postal_code }}</td>
                <td>
                    <form action="{{ route('perfil.updateAddress', 'postal_code') }}" method="POST" class="d-md-flex align-items-center">
                        @csrf
                        <input type="text" name="value1" class="form-control" value="{{ $user->address->postal_code }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{ $user->address->state }}</td>
                <td>
                    <form action="{{ route('perfil.updateAddress', 'state') }}" method="POST" class="d-md-flex align-items-center">
                        @csrf
                        <input type="text" name="value1" class="form-control" value="{{ $user->address->state }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td>{{ $user->address->city }}</td>
                <td>
                    <form action="{{ route('perfil.updateAddress', 'city') }}" method="POST" class="align-items-center d-md-flex">
                        @csrf
                        <input type="text" name="value1" class="form-control" value="{{ $user->address->city }}" required>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>

        <a href="{{route('satisfaction.index')}}"><button class="btn btn-warning" type="button">Encuesta de Satisfacción</button></a>
    </div>
</x-layout>
