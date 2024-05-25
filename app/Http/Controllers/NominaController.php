<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomina; 
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $nominas = Nomina::all();
    return response()->view('nominas.index', compact('nominas'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    
    $usuarios = User::all();
    return response()->view('nominas.create', compact('usuarios'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        // Define tus reglas de validación aquí
    ]);

    // Calcular el monto de la nómina
    $monto_nomina = $request->horas_trabajadas * $request->valor_hora;

    // Crear una nueva instancia de Nomina con el monto de la nómina calculado
    $nomina = new Nomina([
        'usuario_id' => $request->usuario,
        'horas_trabajadas' => $request->horas_trabajadas,
        'valor_hora' => $request->valor_hora,
        'monto_nomina' => $monto_nomina,
    ]);

    // Guardar el registro en la base de datos
    $nomina->save();

    // Redireccionar a la página de inicio o a donde prefieras
    return redirect()->route('nominas.create');

}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomina = Nomina::findOrFail($id);
        return response()->view('nominas.show', compact('nomina'));
    }

    public function createConfirmation()
{
    return view('confirmation');
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nomina = Nomina::findOrFail($id);
        return response()->view('nominas.edit', compact('nomina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            // Define tus reglas de validación aquí
        ]);

        // Obtener la nomina por su ID
        $nomina = Nomina::findOrFail($id);

        // Actualizar los datos de la nomina
        $nomina->update($request->all());

        // Redireccionar a la página de inicio o a donde prefieras
        return response(view("nominas.index"))->whit('success', 'Nomina creada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener la nomina por su ID
        $nomina = Nomina::findOrFail($id);

        // Eliminar la nomina
        $nomina->delete();

        // Redireccionar a la página de inicio o a donde prefieras
        return response(view("nominas.index"))->whit('success', 'Nomina creada exitosamente.');
    }
}
