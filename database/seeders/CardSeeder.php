<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            ['name' => 'Dog', 'image_path' => 'images/memory/dog.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Cat', 'image_path' => 'images/memory/cat.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Rabbit', 'image_path' => 'images/memory/rabbit.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Elephant', 'image_path' => 'images/memory/elephant.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Giraffe', 'image_path' => 'images/memory/giraffe.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Zebra', 'image_path' => 'images/memory/zebra.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Horse', 'image_path' => 'images/memory/horse.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Sheep', 'image_path' => 'images/memory/sheep.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Cow', 'image_path' => 'images/memory/cow.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Chicken', 'image_path' => 'images/memory/chicken.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Duck', 'image_path' => 'images/memory/duck.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Goat', 'image_path' => 'images/memory/goat.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
            ['name' => 'Pig', 'image_path' => 'images/memory/pig.png','syllabu_id'=>1,'theme_id'=>1,'active'=>1],
        ];

        foreach ($cards as $c) {
            Card::create($c);
        }
    }
}
