<?php

namespace Database\Seeders;

use App\Enums\Roles;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Cfls',
            'email' => 'info@cfls.be',           
            'role' => Roles::ADMIN->value,
        ]);

        // User::factory()->count(15)->sequence(
        //     ['name' => 'Raymond Ann', 'email' => 'raymondeahn@hotmail.com', 'role' => Roles::USER->value],
        //     ['name' => 'Catherine Rotschild', 'email' => 'catherine.rotschild@example.com', 'role' => Roles::USER->value],
        //     ['name' => 'Martine Fraiture', 'email' => 'martine.fraiture@example.com', 'role' => Roles::USER->value],
        //     ['name' => 'Catherine Rotschild', 'email' => 'catherine.rotschild2@example.com', 'role' => Roles::USER->value], // Unique email
        //     ['name' => 'Judith Debaise', 'email' => 'judith.debaise@example.com', 'role' => Roles::USER->value],
        //     ['name' => 'Jean-Marie Vander Straeten', 'email' => 'jean.marie.vanderstraeten@example.com', 'role' => Roles::USER->value],
        //     ['name' => 'Rita Petit', 'email' => 'rita.petit@example.com', 'role' => Roles::USER->value],
        //     ['name' => 'Monique', 'email' => 'monique@example.com', 'role' => Roles::USER->value],
        //     ['name' => 'Muriel Denies', 'email' => 'cfls.muriel@gmail.com', 'role' => Roles::USER->value],
        //     ['name' => 'Annick Bouffioux', 'email' => 'cfls.annick@gmail.com', 'role' => Roles::USER->value],
        //     ['name' => 'Saïda Rahmoun', 'email' => 'cfls.saida@gmail.com', 'role' => Roles::USER->value],
        //     ['name' => 'Soraya Manzano Garcia', 'email' => 'cfls.soraya@gmail.com', 'role' => Roles::USER->value],
        //     ['name' => 'Leonel Lopez Borbon', 'email' => 'cfls.leonel@gmail.com', 'role' => Roles::USER->value],
        //     ['name' => 'Valentine De Nayer', 'email' => 'valentine.kervyn.cfls@gmail.com', 'role' => Roles::USER->value],
        //     ['name' => 'Valerio Fravallo', 'email' => 'cfls.valerio@gmail.com', 'role' => Roles::USER->value]
        // )->create();

       
    }
}
