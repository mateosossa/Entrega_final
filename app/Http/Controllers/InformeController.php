<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Nomina;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index(Request $request)
    {
        $query = Informe::query();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $nominas = Nomina::where('id', $search)
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%")
                      ->orWhere('id', $search);
                })->get();

            foreach ($nominas as $nomina) {
                $user = $nomina->user;
                
                Informe::updateOrCreate(
                    ['nomina_id' => $nomina->id],
                    [
                        'user_id' => $user->id,
                        'nombre_usuario' => $user->name,
                        'fecha_realizacion' => $nomina->created_at,
                        'monto_nomina' => $nomina->monto_nomina,
                    ]
                );
            }

            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('id', $search);
            })->orWhere('nomina_id', $search);
        }

        $informes = $query->paginate(10);

        return view('informes.index', compact('informes'));
    }

    public function show(Informe $informe)
    {
        return view('informes.edit', compact('informe'));
    }

    public function update(Request $request, Informe $informe)
    {
        $request->validate([
            'monto_nomina' => 'required|numeric',
        ]);

        $informe->update($request->all());

        return redirect()->route('informes.index')->with('success', 'Informe actualizado con éxito');
    }

    public function export(Request $request)
    {
        return redirect()->back()->with('success', 'Exportado con éxito');
    }
}
