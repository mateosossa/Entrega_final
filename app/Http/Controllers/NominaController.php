<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomina;
use App\Models\User;

class NominaController extends Controller
{
    public function index()
    {
        $nominas = Nomina::all();
        return view('nominas.index', compact('nominas'));
    }

    public function create()
    {
        $usuarios = User::all();
        return view('nominas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
        ]);

        $monto_nomina = $request->horas_trabajadas * $request->valor_hora;

        $nomina = new Nomina([
            'usuario_id' => $request->usuario,
            'horas_trabajadas' => $request->horas_trabajadas,
            'valor_hora' => $request->valor_hora,
            'monto_nomina' => $monto_nomina,
        ]);

        $nomina->save();

        return redirect()->route('nominas.create');
    }

    public function show($id)
    {
        $nomina = Nomina::findOrFail($id);
        return view('nominas.show', compact('nomina'));
    }

    public function createConfirmation()
    {
        return view('confirmation');
    }

    public function edit($id)
    {
        $nomina = Nomina::findOrFail($id);
        return view('nominas.edit', compact('nomina'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Aquí puedes agregar tus reglas de validación
        ]);

        $nomina = Nomina::findOrFail($id);

        $nomina->update($request->all());

        return redirect()->route("nominas.index")->with('success', 'Nómina actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $nomina = Nomina::find($id);

        if (!$nomina) {
            return redirect()->route("nominas.index")->with('error', 'Nómina no encontrada.');
        }

        $nomina->delete();

        return redirect()->route("nominas.index")->with('success', 'Nómina eliminada exitosamente.');
    }
}
