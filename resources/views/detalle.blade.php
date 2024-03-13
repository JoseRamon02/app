<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle</title>
</head>

<body>
    <h1>Detalle de la nota</h1>

    <h3>ID: {{ $nota->id }}</h3>
    <h3>Nombre: {{ $nota->nombre }}</h3>
    <h3>Descripción: {{ $nota->descripcion }}</h3>
</body>

</html>