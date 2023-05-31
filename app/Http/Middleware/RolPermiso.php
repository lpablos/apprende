<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;
use App\Models\Role;
use App\Models\Permiso;
use App\Models\PermisoRole;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;



class RolPermiso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rolypermiso): Response
    {

        if (Auth::check() == false ) {
            return redirect()->route( 'error_route' );
        }
        $user = $request->user();

        $roles_usuario = User::with('roles')->where('active', '=', '1')->where('id', '=', $user->id)->get();
        $roles_asignados = $roles_usuario[0]->roles;


        $rolypermiso = explode('|', $rolypermiso);
        $rolesypermisos = is_array($rolypermiso)
            ? $rolypermiso
            : explode('|', $rolypermiso);

        $tabla_role_user = DB::table('permiso_role AS PR')
        ->select(
            'U.id AS user_id',
            'RU.role_id AS RU_role_id',
            'RU.user_id AS RU_user_id',
            'PR.permiso_id AS PR_permiso_id',
            'PR.role_id AS PR_role_id'
        )
        ->join('role_user as RU','RU.role_id', 'PR.role_id')
        ->join('users as U','U.id', 'RU.user_id')
        ->whereIn('RU.role_id', array($rolesypermisos[0]))
        ->whereIn('PR.permiso_id', array($rolesypermisos[1]))
        ->where('U.id', 1)
        ->get();

        if ( sizeof($tabla_role_user) == 0 ) { 
            return redirect()->route( 'error_route' );
        }


        return $next($request);
    }
}
