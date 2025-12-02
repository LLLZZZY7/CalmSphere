<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Upcoming session
        \App\Models\Appointment::create([
            'user_id' => 1,
            'therapist_id' => 1, // Dr. Emily Watson
            'appointment_time' => now()->addHours(2),
            'status' => 'scheduled',
            'type' => 'Video Call',
        ]);

        // Tomorrow session
        \App\Models\Appointment::create([
            'user_id' => 1,
            'therapist_id' => 2, // Dr. Michael Chen
            'appointment_time' => now()->addDay()->setHour(10)->setMinute(0),
            'status' => 'scheduled',
            'type' => 'Video Call',
        ]);
    }
}
