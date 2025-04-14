<?php
// app/Http/Controllers/VideoController.php
namespace App\Http\Controllers;

use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function getAllVideos()
    {
        $cloudinary = new \Cloudinary\Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => ['secure' => true]
        ]);

        $videos = [];

        $nextCursor = null;
        $carpetaBuscada = 'Syllabus 1/01. Je me présente';

        do {
            $options = [
                'resource_type' => 'video',
                'type' => 'upload',
                'max_results' => 100,
            ];

            if ($nextCursor) {
                $options['next_cursor'] = $nextCursor;
            }

            $response = $cloudinary->adminApi()->assets($options);

            $videos = array_merge(
                $videos,
                array_filter($response['resources'], function ($video) use ($carpetaBuscada) {
                    return isset($video['asset_folder']) && $video['asset_folder'] === $carpetaBuscada;
                })
            );

            $nextCursor = $response['next_cursor'] ?? null;

        } while ($nextCursor);

        foreach ($videos as $video) {
            DB::table('video_themes_cloudinary')->insert([
                'title' => $video['display_name'] ?? $video['public_id'], // por si no existe display_name
                'slug' => Str::slug($video['display_name'] ?? $video['public_id']),
                'theme_id' => 1,
                'syllabu_id' => 1,
                'url' => $video['url'],
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return 'finish';

    }
}
