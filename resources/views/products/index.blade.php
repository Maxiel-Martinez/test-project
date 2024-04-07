<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Incluir archivos CSS y JS necesarios -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
</head>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Volver</a>
                        </li>
                    </ul>
                </div>
<body>
    <h1>Productos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <img src="{{ Storage::url($product->imagen) }}" alt="{{ $product->nombre }}" width="50">
                    </td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->descripcion }}</td>
                    <td>{{ $product->precio }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.create') }}" class="btn btn-success">Crear Nuevo Producto</a>
    <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>


<!-- Tu HTML -->
    <script src="{{ asset('js/preventBack.js') }}"></script>
</body>
</html>
