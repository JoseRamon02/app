<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>
<body>
<h1>Detalle de la nota</h1>

<h3>ID: {{ $nota -> $id }}</h3>
<h3>Nombre: {{ $nota -> $nombre }}</h3>
<h3>Descripción: {{ $nota -> $descripcion }}</h3>
</body>
</html>