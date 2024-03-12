<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use DB;

class NotasController extends Controller
{
    public function notas()
    {
        $notas = Nota::all(); // Nos saca todas las notas de la BBDD
        $notas = Nota::paginate(5);
        return view('notas', compact('notas'));
    }

    public function detalle($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.detalle', compact('notas')); // Corrected 'notas' to 'nota'
    }

    public function crear(Request $request)
    {
        $notaNueva = new Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $request->validate(['nombre' => 'required', 'descripcion' => 'required']);
        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada exitosamente');

    }

    public function editar($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.editar', compact('nota')); // Corrected 'notas' to 'nota'
    }

    public function actualizar(Request $request, $id)
{
    $request->validate(['nombre' => 'required', 'descripcion' => 'required']);

    try {
        DB::beginTransaction();

        // Actualizar la nota
        $notaActualizar = Nota::findOrFail($id);
        $notaActualizar->nombre = $request->nombre;
        $notaActualizar->descripcion = $request->descripcion;
        $notaActualizar->save();

        // Aquí puedes realizar otras operaciones relacionadas con la actualización
        // que necesiten ser parte de la misma transacción.

        // Confirmar la transacción
        DB::commit();

        // Redirigir con un mensaje de éxito
        return redirect()->route('notas')->with('mensaje', 'Nota actualizada');
    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
        DB::rollBack();

        // Redirigir con un mensaje de error
        return redirect()->route('notas')->with('mensaje', 'Error al actualizar la nota');
    }
}

    public function eliminar($id)
    {
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje', 'Nota Eliminada');
    }
}
