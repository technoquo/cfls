<?php

namespace Database\Seeders;

use App\Models\VideoQuizItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VideoQuizItem::create([
            'title' => 'Femme',
            'video_theme_cloudinary_id' => 1,
            'question' => '¿Quelle action était montrée dans la vidéo?',
            'options' => json_encode(['Épouse', 'Époux', 'Mari', 'Fille']),
            'correct_answer' => 'Épouse',
            'syllabu_id' => 1,
            'theme_id' => 1,
            'active' => true,
        ]);
    }
}
