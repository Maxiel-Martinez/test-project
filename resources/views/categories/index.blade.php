<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container my-5">
        <h1>Categorías</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Crear Nueva Categoría</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->nombre }}</td>
                    <td>{{ $category->descripcion }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
           
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
    <script src="{{ asset('js/preventBack.js') }}"></script>
</body>
</html>