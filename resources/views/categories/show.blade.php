<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->nombre }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container my-5">
        <h1>{{ $category->nombre }}</h1>
        <p>{{ $category->descripcion }}</p>
        <div class="d-flex justify-content-end">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning me-2">Editar</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <script src="{{ asset('js/preventBack.js') }}"></script>
</body>
</html>