<?php

namespace Database\Seeders;

use App\Models\Spelling;
use App\Models\Word;
use App\Models\WordCross;
use Illuminate\Database\Seeder;
use App\Models\Question;

class WordsSeeder extends Seeder
{
    public function run(): void
    {
//        $path = storage_path('app/data/words_clean_final.json');
//
//        if (!file_exists($path)) {
//            $this->command->error("❌ No se encontró el archivo JSON: {$path}");
//            return;
//        }
//
//        $data = json_decode(file_get_contents($path), true);
//
//        if (!is_array($data)) {
//            $this->command->error("❌ Error al decodificar el JSON. Verifica su formato.");
//            return;
//        }
//
//        $count = 0;
//        foreach ($data as $q) {
//            WordCross::Create(
//                [
//                    'name' => $q['title'],
//                    'video_theme_cloudinary_id' => $q['video_themes_cloudinary'],
//                    'theme_id' => $q['theme_id'],
//                    'syllabu_id' => $q['syllabu_id'],
//                    'active' => $q['active'],
//                ]
//            );
//            $count++;
//        }
//
//        $this->command->info("✅ {$count} preguntas importadas o actualizadas correctamente.");

        $words = [
            ['text' => 'LARAVEL', 'clue' => 'Framework de PHP muy popular.', 'length' => 7],
            ['text' => 'VUEJS', 'clue' => 'Framework de JavaScript reactivo.', 'length' => 5],
            ['text' => 'MODELO', 'clue' => 'Representa una tabla en la base de datos.', 'length' => 6],
            ['text' => 'MIGRACION', 'clue' => 'Se usa para modificar la estructura de la base de datos.', 'length' => 9],
            ['text' => 'CONTROLADOR', 'clue' => 'Maneja la lógica de la petición HTTP.', 'length' => 11],
            ['text' => 'ROUTER', 'clue' => 'Dirige las peticiones a su destino.', 'length' => 6],
            ['text' => 'PHP', 'clue' => 'Lenguaje de programación de backend.', 'length' => 3],
        ];

        foreach ($words as $word) {
            WordCross::firstOrCreate($word + ['difficulty' => 'medium']);
        }
    }
}
