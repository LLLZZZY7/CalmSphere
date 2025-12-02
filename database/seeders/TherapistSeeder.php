<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Therapist::create([
            'name' => 'Dr. Emily Watson',
            'title' => 'Licensed Clinical Psychologist',
            'location' => 'New York, NY',
            'experience_years' => 10,
            'availability' => 'Mon-Fri, 9 AM - 6 PM',
            'price_per_session' => 120.00,
            'rating' => 4.9,
            'review_count' => 127,
            'image_url' => 'https://ui-avatars.com/api/?name=Emily+Watson&background=random',
            'specialties' => json_encode(['Anxiety', 'Stress Management', 'CBT']),
        ]);

        \App\Models\Therapist::create([
            'name' => 'Dr. Michael Chen',
            'title' => 'Specializing in depression',
            'location' => 'San Francisco, CA',
            'experience_years' => 8,
            'availability' => 'Tue-Sat, 10 AM - 7 PM',
            'price_per_session' => 110.00,
            'rating' => 4.8,
            'review_count' => 94,
            'image_url' => 'https://ui-avatars.com/api/?name=Michael+Chen&background=random',
            'specialties' => json_encode(['Depression', 'Life Transitions', 'Mindfulness']),
        ]);

        \App\Models\Therapist::create([
            'name' => 'Dr. Sarah Johnson',
            'title' => 'Family Therapist',
            'location' => 'Los Angeles, CA',
            'experience_years' => 12,
            'availability' => 'Mon-Thu, 8 AM - 4 PM',
            'price_per_session' => 130.00,
            'rating' => 5.0,
            'review_count' => 156,
            'image_url' => 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=random',
            'specialties' => json_encode(['Family Therapy', 'Couples Counseling']),
        ]);
        
        \App\Models\Therapist::create([
            'name' => 'Dr. James Martinez',
            'title' => 'Clinical Psychiatrist',
            'location' => 'Austin, TX',
            'experience_years' => 15,
            'availability' => 'Wed-Sun, 11 AM - 8 PM',
            'price_per_session' => 150.00,
            'rating' => 4.7,
            'review_count' => 82,
            'image_url' => 'https://ui-avatars.com/api/?name=James+Martinez&background=random',
            'specialties' => json_encode(['Psychiatry', 'Medication Management']),
        ]);
    }
}
