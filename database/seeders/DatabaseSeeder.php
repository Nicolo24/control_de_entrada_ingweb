<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Casa;
use App\Persona;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'nicolas',
            'email' => 'nicolas@nicolas.com',
        ]);

        $role = new \App\Role();
        $role->name='Administrador';
        $role->save();

        $role = new \App\Role();
        $role->name='Guardia';
        $role->save();

        $role = new \App\Role();
        $role->name='Persona';
        $role->save();

        $role = new \App\Role();
        $role->name='Visitante';
        $role->save();

        $casa = new Casa();
        $casa->friendly_id="326";
        $casa->latitude="1";
        $casa->longitude="1";
        $casa->phone="023433318";
        $casa->save();

        $persona= new Persona();
        $persona->name="Nicolas Cabezas";
        $persona->phone="593997181476";
        $persona->casa_id=1;
        $persona->role=1;
        $persona->save();

    }
}
