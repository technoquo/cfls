<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            // Choice
            [
                'video_id' => 1, // ajusta al ID real en tu tabla video_themes_cloudinary
                'question_text' => 'Sélectionnez le mot qui correspond à ce signe.',
                'type' => 'choice',
                'options' => json_encode(['mari', 'épouse', 'homme']),
                'answer' => 'mari',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Text
            [
                'video_id' => 1,
                'question_text' => 'Écrivez la traduction de ce signe.',
                'type' => 'text',
                'options' => null,
                'answer' => 'mari',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Video-choice
            [
                'video_id' => null,
                'question_text' => 'Choisissez la vidéo qui correspond au mot : mari',
                'type' => 'video-choice',
                'options' => json_encode([
                    [
                        'video' => 'https://res.cloudinary.com/dmhdsjmzf/video/upload/v1745918240/Promener_Le_Chien_2_isemn4.mp4',
                        'value' => 'femme'
                    ],
                    [
                        'video' => 'https://res.cloudinary.com/dmhdsjmzf/video/upload/v1745921764/%C3%89poux-Mari_etbofl.mp4',
                        'value' => 'mari'
                    ],
                    [
                        'video' => 'https://res.cloudinary.com/dmhdsjmzf/video/upload/v1745921767/%C3%89pouse-Femme_orprpc.mp4',
                        'value' => 'enfant'
                    ],
                ]),
                'answer' => 'mari',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Yes/No
            [
                'video_id' => 1,
                'question_text' => 'Ce signe correspond-il au mot : "mari" ?',
                'type' => 'yes-no',
                'options' => json_encode(['oui', 'non']),
                'answer' => 'oui',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
