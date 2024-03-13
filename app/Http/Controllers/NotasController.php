<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class NotasController extends Controller
{
    public function notas()
    {
        $nota = Nota::paginate(2); 
        return view('notas', compact('nota'));
    }

    public function detalle($id)
    {
        $nota = Nota::findOrFail($id);
        return view('detalle', compact('nota')); 
    }

    public function crear(Request $request)
    {
        $request->validate(['nombre' => 'required', 'descripcion' => 'required']); // Validate before saving

        $notaNueva = new Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada exitosamente');
    }

    public function editar($id)
    {
        $nota = Nota::findOrFail($id); // Cambiado 'notas' a 'nota'
        return view('notas.editar', compact('nota')); // Corrected 'notas' to 'nota'
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate(['nombre' => 'required', 'descripcion' => 'required']); // Validate before saving

        try {
            DB::beginTransaction(); // Start transaction

            $notaActualizar = Nota::findOrFail($id);
            $notaActualizar->nombre = $request->nombre;
            $notaActualizar->descripcion = $request->descripcion;
            $notaActualizar->save();

            DB::commit(); // Commit transaction

            return redirect()->route('notas.volver')->with('mensaje', 'Nota actualizada');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction in case of error

            return redirect()->route('notas.volver')->with('mensaje', 'Error al actualizar la nota');
        }
    }

    public function eliminar($id)
    {
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje', 'Nota Eliminada');
    }
}
