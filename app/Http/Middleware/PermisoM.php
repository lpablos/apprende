<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PermisoM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permiso): Response
    {
        
        if (Auth::check() == false ) {
            return redirect()->route( 'error_route' );
        }
        $user = $request->user();

        $permisos_usuario = User::with('permisos')->where('active', '=', '1')->where('id', '=', $user->id)->get();
        $permisos_asignados = $permisos_usuario[0]->permisos;

        $permiso = explode('|', $permiso);
        $permisos = is_array($permiso)
            ? $permiso
            : explode('|', $permiso);

        foreach($permisos_asignados as $permiso_asignado){
            if( in_array($permiso_asignado['name'], $permisos) ) {
                return $next($request);
            }else{
                // return redirect('/error_permiso');
                return redirect()->route( 'error_route' );
            }
        }
    }
}
