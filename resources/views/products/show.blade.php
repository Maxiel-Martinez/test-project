<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nombre }}</title>
    <!-- Incluir archivos CSS y JS necesarios -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ Storage::url($product->imagen) }}" alt="{{ $product->nombre }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->nombre }}</h1>
                <p>{{ $product->descripcion }}</p>
                <p><strong>Precio:</strong> ${{ $product->precio }}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning me-2">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/preventBack.js') }}"></script>
</body>
</html>