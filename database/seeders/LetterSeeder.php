<?php

namespace Database\Seeders;

use App\Models\Letter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letters = range('a', 'z');
        foreach ($letters as $char) {
            Letter::updateOrCreate(['symbol' => $char], [
                'image' => "img/letters/{$char}.png"
            ]);
        }
    }
}
