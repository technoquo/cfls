<?php

namespace Database\Seeders;

use App\Models\VerifyCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VerifyCode::factory()
            ->count(3000)
            ->state(fn () => [
                'user_id' => 0,
                'theme'   => null,
                'active'  => 0,
            ])
            ->create();
    }
}
