<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // URL informativa
        // https://spatie.be/docs/laravel-permission/v5/advanced-usage/seeding


        // Diversos roles
        $role_usr_gral = Role::create(['name' => 'usuario-general']);
        $role_usr_coldr = Role::create(['name' => 'usuario-colaborador']);
        $role_sp_admin = Role::create(['name' => 'super-administrador']);
        $role_ay_admin = Role::create(['name' => 'ayudante-administrador']);

        // Listado de Permisos Generales
        $permis1 = Permission::create(['name' =>'ver general']);
        $permis2 = Permission::create(['name' =>'editar general']);
        $permis3 = Permission::create(['name' =>'actualizar general']);
        $permis4 = Permission::create(['name' =>'ver perfil']);
        $permis5 = Permission::create(['name' =>'editar perfil']);
        $permis6 = Permission::create(['name' =>'ver compras']);
        $permis7 = Permission::create(['name' =>'editar compras']);
        
        // Listado de permisos
        $role_usr_gral->syncPermissions(Permission::all());
        $role_usr_coldr->syncPermissions(Permission::all());
        $role_sp_admin->syncPermissions(Permission::all());
        $role_ay_admin->syncPermissions(Permission::all());

        // Creacion de usuarios y Asociacion de roles
       
        $userGeneral = User::create([
            'name' => "ugeneral",
            'ap_paterno'=>"ugeneral",
            'ap_materno'=>"ugeneral",
            'email' => "ugeneral@admin.com",
            'password' => Hash::make('12345678'),
        ]);
        $userGeneral->assignRole('usuario-general');        

        $userColaborador = User::create([
            'name' => "ucolabora",
            'ap_paterno'=>"ucolabora",
            'ap_materno'=>"ucolabora",
            'email' => "ucolabora@admin.com",
            'password' => Hash::make('12345678'),
        ]);
        $userColaborador->assignRole('usuario-colaborador');

        $superAdmin = User::create([
            'name' => "uadministrador",
            'ap_paterno'=>"uadministrador",
            'ap_materno'=>"uadministrador",
            'email' => "uadministrador@admin.com",
            'password' => Hash::make('12345678'),
        ]);
        $superAdmin->assignRole('super-administrador');

        $ayudaAdmin = User::create([
            'name' => "uayudante",
            'ap_paterno'=>"uayudante",
            'ap_materno'=>"uayudante",
            'email' => "uayudante@admin.com",
            'password' => Hash::make('12345678'),
        ]);
        $ayudaAdmin->assignRole('ayudante-administrador');
    }
}
