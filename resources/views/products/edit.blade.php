<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <!-- Incluir archivos CSS y JS necesarios -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
</head>
<body>
    <h1>Editar Producto</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $product->nombre) }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $product->descripcion) }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio', $product->precio) }}" required>
            @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
            @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-container">
          <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Volver</a>
    </form>
    <script src="{{ asset('js/preventBack.js') }}"></script>
</body>
</html>