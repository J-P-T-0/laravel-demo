<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('storage/image/logo.png') }}" alt="Logo"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse bg-dark w-100 m-0 p-0" id="mynavbar">
            <ul class="navbar-nav flex-fill">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('products.category',['product' => "Proteína"])}}">Proteína</a></li>
                        <li><a class="dropdown-item" href="{{route('products.category',['product' => "Suplemento"])}}">Suplemento</a></li>
                        <li><a class="dropdown-item" href="{{route('products.category',['product' => "Creatina"])}}">Creatina</a></li>
                        <li><a class="dropdown-item" href="{{route('products.category',['product' => "Pre-Entreno"])}}">Pre-Entreno</a></li>
                    </ul>
                </li>

                @if(auth()->check() && auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('products.control.dashboard') }}">Panel de Control</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('products.index') }}">Catálogo</a>
                </li>

                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cart.index') }}">Carrito</a>
                    </li>
                @endif

                <li class="flex-grow-1"></li>

                <li class="d-flex align-items-center">
                    <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                        <input style="width: clamp(300px,20vw,500px)" class="form-control me-2" type="text" name="query" placeholder="Búsqueda" required>
                        <button class="btn btn-warning" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </li>

                @if(!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('login') }}"><i class="bi bi-person-fill h4"></i></a>
                    </li>
                @else
                    <li class="nav-item d-flex mx-auto">
                        <form class="h-100 p-1 m-0" style="width: 50px" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary p-0 m-0 w-100 h-100" ><i class="bi bi-box-arrow-right h4"></i></button>
                        </form>
                    </li>
                @endif

                @if(auth()->check())
                    <li class="nav-item">
                        <form action="{{route('perfil.edit')}}" method="get" class="h-100 p-1 m-0" style="width: 50px">
                            @csrf
                            <button type="submit" class="btn btn-warning p-0 m-0 w-100 h-100"><i class="bi bi-person-fill-gear h4"></i></button>
                        </form>
                    </li>
                @endif
            </ul>


        </div>
    </div>
</nav>
