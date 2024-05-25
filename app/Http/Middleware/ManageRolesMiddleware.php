<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageRolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
{
    // Verificar si el usuario está autenticado
    $user = $request->user();
    if (!$user) {
        // Si el usuario no está autenticado, redirigirlo al inicio de sesión o mostrar un error
        return redirect()->route('login'); // Ejemplo de redirección al inicio de sesión
    }

    // Obtener el rol del usuario
    $role = $user->role;

    // Verificar si el usuario tiene el rol de "Admin"
    if ($role && $role->name === 'Admin') {
        // Si el usuario tiene el rol de "Admin", permitir el acceso a la ruta
        return $next($request);
    }

    // Si el usuario no tiene el rol necesario, retornar un error 403 (prohibido)
    return abort(403, 'Unauthorized');
}

}
