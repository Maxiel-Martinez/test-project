<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiquetas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container my-5">
        <h1>Etiquetas</h1>
        <a href="{{ route('tags.create') }}" class="btn btn-success mb-3">Crear Nueva Etiqueta</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->nombre }}</td>
                    <td>
                        <a href="{{ route('tags.show', $tag) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display: inline;">
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