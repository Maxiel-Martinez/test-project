<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseña de {{ $review->usuario }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container my-5">
        <h1>Reseña de {{ $review->usuario }}</h1>
        <p><strong>Producto:</strong> {{ $review->product->nombre }}</p>
        <p><strong>Puntuación:</strong> {{ $review->puntuacion }} / 5</p>
        <p><strong>Comentario:</strong> {{ $review->comentario }}</p>
        <div class="d-flex justify-content-end">
            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning me-2">Editar</a>
            <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <a href="{{ route('reviews.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <script src="{{ asset('js/preventBack.js') }}"></script>
</body>
</html>