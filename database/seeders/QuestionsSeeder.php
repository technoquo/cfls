<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Syllabu;
use App\Models\Theme;
use Illuminate\Support\Facades\File;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/data/modificado.json');

        if (!file_exists($path)) {
            $this->command->error("❌ No se encontró el archivo JSON: {$path}");
            return;
        }

        $data = json_decode(File::get($path), true);

        if (!is_array($data)) {
            $this->command->error("❌ Error al decodificar el JSON. Verifica su formato.");
            return;
        }

        $count = 0;

        foreach ($data as $q) {

            // Crear syllabus si no existe
            $syllabus = Syllabu::firstOrCreate(
                ['id' => $q['syllabu_id']],
                ['name' => 'Syllabus '.$q['syllabu_id']]
            );

            // Crear theme si no existe
            $theme = Theme::firstOrCreate(
                ['id' => $q['theme_id']],
                [
                    'name' => 'Theme '.$q['theme_id'],
                    'syllabu_id' => $syllabus->id
                ]
            );

            // Insertar o actualizar pregunta
            Question::updateOrCreate(
                [
                    // CRITERIO DE BÚSQUEDA:
                    // evitamos usar id para no chocar con existentes
                    'syllabu_id' => $syllabus->id,
                    'theme_id' => $theme->id,
                    'question_text' => $q['question_text'],
                ],
                [
                    // CAMPOS A ACTUALIZAR O INSERTAR
                    'video_id' => $q['video_id'] ?? null,
                    'type' => $q['type'] ?? 'text',

                    // Mantener "options" como STRING exacto (NO decodificar)
                    'options' => is_string($q['options'])
                        ? $q['options']
                        : json_encode($q['options'], JSON_UNESCAPED_UNICODE),

                    'answer' => $q['answer'] ?? '',
                    'created_at' => $q['created_at'] ?? now(),
                    'updated_at' => $q['updated_at'] ?? now(),
                ]
            );

            $count++;
        }

        $this->command->info("✅ {$count} preguntas importadas o actualizadas correctamente.");
    }
}
