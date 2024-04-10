<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Etiqueta</title>

    <link rel="stylesheet" href="{{ asset('css/create.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Etiqueta</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tags.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Etiqueta</button>
                        </form>
                        <a href="{{ route('tags.index') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
