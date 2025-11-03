<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/public/app/data/questions_match_updated.json');

        if (!file_exists($path)) {
            $this->command->error("❌ No se encontró el archivo JSON: {$path}");
            return;
        }

        $data = json_decode(file_get_contents($path), true);

        if (!is_array($data)) {
            $this->command->error("❌ Error al decodificar el JSON. Verifica su formato.");
            return;
        }

        $count = 0;
        foreach ($data as $q) {
            Question::updateOrCreate(
                ['id' => $q['id']],
                [
                    'syllabu_id' => $q['syllabu_id'],
                    'theme_id' => $q['theme_id'],
                    'video_id' => $q['video_id'] ?? null,
                    'question_text' => $q['question_text'],
                    'type' => $q['type'],
                    'options' => $q['options'],
                    'answer' => $q['answer'],
                ]
            );
            $count++;
        }

        $this->command->info("✅ {$count} preguntas importadas o actualizadas correctamente.");
    }
}
