<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RolM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rol): Response
    {
        if ( Auth::check() == false ) {
            return redirect()->route( 'error_route' );
        }
        $user = $request->user();

        $roles_usuario = User::with('roles')->where('active', '=', '1')->where('id', '=', $user->id)->get();
        $roles_asignados = $roles_usuario[0]->roles;

        $rol = explode('|', $rol);
        $roles = is_array($rol)
            ? $rol
            : explode('|', $rol);


        foreach($roles_asignados as $rol_asignado){
            if( in_array($rol_asignado['name'], $roles) ) {
                return $next($request);
            }
        }

        return redirect()->route( 'error_route' );

    }
}
