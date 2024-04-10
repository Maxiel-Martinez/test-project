<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Catálogo de Productos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Ver Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.create') }}">Crear Producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Ver Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.create') }}">Crear Categoría</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tags.index') }}">Ver Etiquetas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tags.create') }}">Crear Etiqueta</a>
                        </li>
        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <h1 class="text-center mb-4">Bienvenido a nuestro Catálogo de Productos</h1>
        <p class="lead text-center mb-5">Aquí puedes ver, agregar, editar y eliminar productos, categorías, etiquetas y reseñas de forma sencilla.</p>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('imagen/Untitled-4-400x250.jpg') }}" class="card-img-top" alt="Producto">
                    <div class="card-body">
                        <h5 class="card-title">Producto Destacado - Maquillaje</h5>
                        <p class="card-text">Descripción del producto destacado.</p>
                        <a href="{{ route('products.show', 4) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-primary text-white py-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2023 Catálogo de Productos. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/preventBack.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>