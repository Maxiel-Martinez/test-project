<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Etiqueta</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Etiqueta</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tags.update', $tag->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar Etiqueta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
