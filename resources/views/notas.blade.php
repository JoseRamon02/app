<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    
</head>

<body>
    <h1>@lang('messages.Notas desde base de datos')</h1>
    <div class="m-4">
        <table border="1" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            @if (isset($nota))
                @foreach ($nota as $notas)
                    <tr>
                        <td>{{ $notas -> id }}</td>
                        <td>{{ $notas->nombre }}</td>
                        <td>{{ $notas->descripcion }}</td>
                        <td> 
                            <a href="{{route('notas.editar',['id'=>$notas->id])}}" class="btn btn-warning btn-sm">Editar</a>
  
                            <form action="{{route('notas.eliminar',['id'=>$notas->id])}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form></td>
                    </tr>
                @endforeach
            @endif

        </table>
        {{ $nota->links() }}
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
</body>

</html>
