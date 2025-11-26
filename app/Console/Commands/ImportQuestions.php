<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImportQuestions extends Command
{
    protected $signature = 'import:questions';
    protected $description = 'Importar preguntas desde modificado.json';

    public function handle()
    {
        $this->info("Leyendo archivo...");

        $filePath = storage_path('app/data/modificado.json');
        
        if (!file_exists($filePath)) {
            $this->error("Error: el archivo no existe en " . $filePath);
            return;
        }
        
        $json = file_get_contents($filePath);
        
        if (empty($json)) {
            $this->error("Error: el archivo está vacío.");
            return;
        }
        
        $questions = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error("Error: el JSON está mal formado - " . json_last_error_msg());
            return;
        }
        
        if (!is_array($questions) || count($questions) === 0) {
            $this->error("Error: el JSON no contiene preguntas.");
            return;
        }

        $this->info("Insertando " . count($questions) . " preguntas...");

        DB::beginTransaction();

        try {
            foreach ($questions as $q) {
                DB::table('questions')->insert([
                    'syllabu_id'    => $q['syllabu_id'],
                    'theme_id'      => $q['theme_id'],
                    'video_id'      => $q['video_id'],
                    'question_text' => $q['question_text'],
                    'type'          => $q['type'],
                    'options'       => $q['options'],
                    'answer'        => $q['answer'],
                    'created_at'    => $q['created_at'],
                    'updated_at'    => $q['updated_at'],
                ]);
            }

            DB::commit();
            $this->info("✔ Importación completa.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("❌ Error durante la importación: " . $e->getMessage());
        }
    }
}
