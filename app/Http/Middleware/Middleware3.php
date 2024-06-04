<?php

//Parte de stiven

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class Middleware3
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {   
    
    $user = $request->user();
    if (!$user) {
        
        return redirect()->route('login'); 
    }  

    $role = $user->role->name;


    
    if ($role && $role == 'Admin' || $role && $role =='Analyst' || $role && $role == 'Reader User') {
        
       
        return $next($request);
    }
    
    return abort(403, 'No tienes permisos para acceder a esta sección.');
}

}
