<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <h1>Notas desde base de datos</h1>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            @if (isset($notas))
            @foreach($notas as $nota)
            <tr>
                <td>{{ $nota->nombre }}</td>
                <td>{{ $nota->descripcion }}</td>
            </tr>   
            @endforeach
            @endif
            
        </table>
        {{$notas->links()}}
    </div>
<br>
    <form action="{{ route('notas.crear') }}" method="POST">
        @csrf @error('nombre')
            <div class="alert alert-danger"> No olvides rellenar el nombre</div>
        @enderror
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control mb-2"
            placeholder="Nombre de la nota" autofocus>
        @error('descripcion')
            <div class="alert alert-danger"> No olvides rellenar el descripcion</div>
        @enderror
        <input type="text" name="descripcion" placeholder="Descripción de la nota" class="form-control mb-2">
        <button class="btn btn-primary btn-block" type="submit"> Crear nueva nota </button>
    </form>
    <br>
    @if (session('mensaje'))
        <div class="mensaje-nota-creada">
            {{ session('mensaje') }}
        </div>
    @endif
    <br>
    <a href="{{ route('notas.editar', $nota) }}" class="btn btn-warning btn-sm"> Editar</a>
    <br>
    <form action="{{ route('notas.eliminar', $nota) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
    </form>
</body>

</html>
