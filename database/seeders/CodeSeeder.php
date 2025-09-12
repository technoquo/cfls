<?php

namespace Database\Seeders;

use App\Models\VerifyCode;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalPerGroup = 3000;

        foreach (range(1, 2) as $group) {
            for ($i = 1; $i <= $totalPerGroup; $i++) {
                // Longitud según syllabus
                $length = ($group === 1) ? 6 : 7;

                // Generar código aleatorio + sufijo U1 / U2
                $code = $this->generateCode($length) . 'U' . $group;

                VerifyCode::create([
                    'user_id' => null,
                    'code'    => $code,
                    'theme'   => 'theme' . $group,
                    'active'  => 0,
                ]);
            }
        }
    }

    /**
     * Generar un código aleatorio con letras, números y símbolos.
     */
    private function generateCode(int $length): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*';
        $charactersLength = strlen($characters);
        $result = '';

        for ($i = 0; $i < $length; $i++) {
            $result .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $result;
    }
}
