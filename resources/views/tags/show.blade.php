<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Etiqueta</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de Etiqueta</div>

                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $tag->nombre }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
