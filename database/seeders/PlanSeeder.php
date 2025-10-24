<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Plan Annuel',
                'slug' => 'annuel',
                'price' => 99.00,
                'currency' => 'EUR',
                'duration_days' => 365,
                'description' => 'Économise en payant à l’année.',
            ],
            [
                'name' => 'Plan 3 Mois',
                'slug' => '3mois',
                'price' => 30.00,
                'currency' => 'EUR',
                'duration_days' => 90,
                'description' => 'Flexibilité avec paiement trimestriel.',
            ],
            [
                'name' => 'Plan Mensuel',
                'slug' => 'mensuel',
                'price' => 12.00,
                'currency' => 'EUR',
                'duration_days' => 30,
                'description' => 'Parfait si tu veux essayer.',
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(['slug' => $plan['slug']], $plan);
        }

        $this->command->info('✅ Plans seeded successfully!');
    }
}
