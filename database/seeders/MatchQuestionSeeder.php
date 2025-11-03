<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'syllabu_id' => 1,
            'theme_id' => 1,
            'video_id' => null,
            'question_text' => 'Associez le bon mot avec le bon signe',
            'type' => 'match',
            'options' => json_encode([
                ['word' => 'Femme', 'video' => 'Épouse-Femme_orprpc'],
                ['word' => 'Mari', 'video' => 'Époux-Mari_etbofl'],
                ['word' => 'Homme', 'video' => 'Homme_2_ed4fn8'],
                ['word' => 'Femme (autre)', 'video' => 'Femme_d8oabf'],
            ]),
            'answer' => null,
        ]);
    }
}
