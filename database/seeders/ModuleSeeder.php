<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            [
                'title' => 'Understanding Anxiety',
                'description' => 'Learn the basics of anxiety, its triggers, and how it affects your body and mind.',
                'category' => 'Anxiety',
                'duration_minutes' => 15,
                'exercises_count' => 3,
            ],
            [
                'title' => 'Deep Breathing 101',
                'description' => 'Master the art of deep breathing to instantly calm your nervous system.',
                'category' => 'Stress Relief',
                'duration_minutes' => 10,
                'exercises_count' => 1,
            ],
            [
                'title' => 'Mindfulness Meditation',
                'description' => 'A guided introduction to mindfulness meditation for beginners.',
                'category' => 'Mindfulness',
                'duration_minutes' => 20,
                'exercises_count' => 2,
            ],
            [
                'title' => 'Sleep Hygiene Basics',
                'description' => 'Tips and techniques to improve your sleep quality and routine.',
                'category' => 'Self-Care',
                'duration_minutes' => 12,
                'exercises_count' => 4,
            ],
            [
                'title' => 'Challenging Negative Thoughts',
                'description' => 'Cognitive Behavioral Therapy (CBT) techniques to reframe negative thinking patterns.',
                'category' => 'CBT',
                'duration_minutes' => 25,
                'exercises_count' => 5,
            ],
            [
                'title' => 'Daily Gratitude Practice',
                'description' => 'Cultivate a positive mindset through daily gratitude exercises.',
                'category' => 'Self-Care',
                'duration_minutes' => 5,
                'exercises_count' => 1,
            ],
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
