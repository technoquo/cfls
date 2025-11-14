<?php

namespace Database\Seeders;

use App\Models\WordCross;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            ['name' => 'casa', 'image' => 'images/words/casa.png'],
            ['name' => 'gato', 'image' => 'images/words/gato.png'],
            ['name' => 'perro', 'image' => 'images/words/perro.png'],
        ];

        foreach ($words as $w) {
            WordCross::updateOrCreate(['name' => $w['name']], $w);
        }
    }
}
