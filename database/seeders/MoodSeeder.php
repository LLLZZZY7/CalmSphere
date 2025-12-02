<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create moods for the last 30 days for User ID 1
        $startDate = now()->subDays(30);

        for ($i = 0; $i < 30; $i++) {
            $date = $startDate->copy()->addDays($i);
            
            // Randomly skip some days to make it realistic
            if (rand(0, 10) > 8) continue;

            \App\Models\Mood::create([
                'user_id' => 1,
                'mood_score' => rand(1, 5),
                'description' => 'Sample mood entry for ' . $date->format('M d'),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
