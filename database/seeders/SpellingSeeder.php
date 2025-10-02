<?php

namespace Database\Seeders;

use App\Models\Spelling;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            // Animales
            ['word' => 'chien', 'active' => 1],
            ['word' => 'chat', 'active' => 1],
            ['word' => 'cheval', 'active' => 1],
            ['word' => 'oiseau', 'active' => 1],
            ['word' => 'poisson', 'active' => 1],

            // Casa
            ['word' => 'maison', 'active' => 1],
            ['word' => 'porte', 'active' => 1],
            ['word' => 'fenetre', 'active' => 1],
            ['word' => 'chaise', 'active' => 1],
            ['word' => 'table', 'active' => 1],

            // Escuela
            ['word' => 'ecole', 'active' => 1],
            ['word' => 'livre', 'active' => 1],
            ['word' => 'stylo', 'active' => 1],
            ['word' => 'crayon', 'active' => 1],
            ['word' => 'cahier', 'active' => 1],

            // Colores
            ['word' => 'rouge', 'active' => 1],
            ['word' => 'bleu', 'active' => 1],
            ['word' => 'vert', 'active' => 1],
            ['word' => 'jaune', 'active' => 1],
            ['word' => 'noir', 'active' => 1],

            // Números
            ['word' => 'un', 'active' => 1],
            ['word' => 'deux', 'active' => 1],
            ['word' => 'trois', 'active' => 1],
            ['word' => 'quatre', 'active' => 1],
            ['word' => 'cinq', 'active' => 1],
            ['word' => 'six', 'active' => 1],
            ['word' => 'sept', 'active' => 1],
            ['word' => 'huit', 'active' => 1],
            ['word' => 'neuf', 'active' => 1],
            ['word' => 'dix', 'active' => 1],
        ];
        foreach ($words as $word) {
            Spelling::create($word);
        }
    }
}
