<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container my-5">
        <h1>Reseñas</h1>
       
        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Puntuación</th>
                    <th>Comentario</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->usuario }}</td>
                    <td>{{ $review->puntuacion }}</td>
                    <td>{{ $review->comentario }}</td>
                    <td>{{ $review->product->nombre }}</td>
                    <td>
                        <a href="{{ route('reviews.show', $review) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
            <a href="{{ route('reviews.create') }}" class="btn btn-success mb-3">Crear Nueva Reseña</a><br>
            
            
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
    <script src="{{ asset('js/preventBack.js') }}"></script>
</body>
</html>