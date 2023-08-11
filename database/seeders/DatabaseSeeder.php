<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DashboardTableSeeder::class,
        ]);

        DB::table('rols')->insert([
            'rol'  => 'Administrador',
        ]);
        DB::table('rols')->insert([
            'rol'  => 'Cliente',
        ]);

        DB::table('users')->insert([
            'name'  => 'Administrador',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345678'),
            'rol_id' => '1',
            'created_at' => now(),
        ]);
        
/*         DB::table('productos')->insert([
            'nombre'  => 'Camisa',
            'categoria'     => 'Camisas',
            'precio'  => 50,
            'cantidad' => '1',
            'slug' => Str::slug(('nombre')),
            'created_at' => now(),
        ]); */
    }
}
