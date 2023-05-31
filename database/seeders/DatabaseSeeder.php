<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
             'name'             => 'a1',
             'email'            => 'a1@b.com',
             'password'         => Hash::make('abc123'),
             'active'           => 1
        ]);

        \App\Models\Role::create([
            'name'             => 'Administracion',
       ]);

       \App\Models\Permiso::create([
        'name'             => 'permiso_1',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);



    }
}
