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
        $totalPerGroup = 3000;

        foreach (range(1, 7) as $group) {
            for ($i = 1; $i <= $totalPerGroup; $i++) {
                VerifyCode::create([
                    'user_id' => null,
                    'code'    => $group . str_pad($i, 7, '0', STR_PAD_LEFT),
                    'theme'   => 'theme' . $group,
                    'active'  => 0,
                ]);
            }
        }
    }
}
