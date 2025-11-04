<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Syllabu; // Asegurar importación
use App\Models\Theme;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/public/app/data/match_by_theme_grouped.json');

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

            // ✅ Crear syllabus si no existe
            $syllabus = Syllabu::firstOrCreate([
                'id' => $q['syllabu_id']
            ], [
                'name' => 'Syllabus '.$q['syllabu_id'],
            ]);

            // ✅ Crear theme si no existe y vincular syllabus
            $theme = Theme::firstOrCreate([
                'id' => $q['theme_id']
            ], [
                'name' => 'Theme '.$q['theme_id'],
                'syllabu_id' => $syllabus->id,
            ]);

            // ✅ Insertar/actualizar la pregunta
            Question::updateOrCreate(
                ['id' => $q['id']],
                [
                    'syllabu_id' => $syllabus->id,
                    'theme_id' => $theme->id,
                    'video_id' => $q['video_id'] ?? null,
                    'question_text' => $q['question_text'] ?? '',
                    'type' => $q['type'] ?? 'text',
                    'options' => is_string($q['options'])
                        ? json_decode($q['options'], true)
                        : $q['options'],
                    'answer' => $q['answer'] ?? '',
                ]
            );

            $count++;
        }

        $this->command->info("✅ {$count} preguntas importadas o actualizadas correctamente.");
    }
}
