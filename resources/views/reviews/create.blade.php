<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reseña</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
</head>
<body>
    <div class="container">
        <h1>Crear Reseña</h1>

        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" value="{{ old('usuario') }}" required>
                @error('usuario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required>{{ old('content', $review->content ?? '') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="puntuacion">Puntuación</label>
                <input type="number" class="form-control @error('puntuacion') is-invalid @enderror" id="puntuacion" name="puntuacion" value="{{ old('puntuacion') }}" min="1" max="5" required>
                @error('puntuacion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="product_id">Producto</label>
                <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                    <option value="">Selecciona un producto</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('producto_id') == $product->id ? 'selected' : '' }}>{{ $product->nombre }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear Reseña</button>
            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
        <br>
        <a href="{{ route('reviews.index') }}" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
