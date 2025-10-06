<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        // Planes disponibles
        $plans = [
            [
                'plan_name' => 'Annuel',
                'price' => 99.00,
                'currency' => 'EUR',
                'duration_days' => 365,
            ],
            [
                'plan_name' => '3 Mois',
                'price' => 30.00,
                'currency' => 'EUR',
                'duration_days' => 90,
            ],
            [
                'plan_name' => 'Mensuel',
                'price' => 12.00,
                'currency' => 'EUR',
                'duration_days' => 30,
            ],
        ];

        // Buscar algunos usuarios existentes
        $users = User::take(3)->get();

        if ($users->isEmpty()) {
            $this->command->warn('⚠️ No users found. Please seed users first.');
            return;
        }

        // Asignar un plan a cada usuario
        foreach ($users as $index => $user) {
            $plan = $plans[$index % count($plans)];
            $start = Carbon::now();
            $end = Carbon::now()->addDays($plan['duration_days']);

            Subscription::create([
                'user_id' => $user->id,
                'plan_name' => $plan['plan_name'],
                'price' => $plan['price'],
                'currency' => $plan['currency'],
                'duration_days' => $plan['duration_days'],
                'starts_at' => $start,
                'ends_at' => $end,
                'status' => 'active',
            ]);
        }

        $this->command->info('✅ Subscriptions seeded successfully!');
    }
}
