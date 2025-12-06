<?php

namespace App\Http\Controllers;

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Search\SearchApi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function getAllVideos()
    {

        // Configurar Cloudinary globalmente
        Configuration::instance([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => ['secure' => true]
        ]);
        // Replace 'your-folder-name' with your actual folder name
        $folderPath = "Syllabus 3/THEME 7";

        $search = new SearchApi();



        $response = $search->expression("resource_type:video AND folder:\"$folderPath\"")
            ->sortBy('created_at','desc')
            ->maxResults(250)
            ->execute();
        foreach ($response['resources'] as $video) {
            DB::table('video_themes_cloudinary')->insert([
                'title' => $video['display_name'] ?? $video['public_id'], // por si no existe display_name
                'slug' => Str::slug($video['display_name'] ?? $video['public_id']),
                'theme_id' => 27, //10. À l'école
                'syllabu_id' => 3, // Syllabuts 2
                'url' => $video['url'],
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return response()->json($response);
    }
}
