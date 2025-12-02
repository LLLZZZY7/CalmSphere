<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    protected $fillable = [
        'name',
        'title',
        'location',
        'experience_years',
        'availability',
        'price_per_session',
        'rating',
        'review_count',
        'image_url',
        'specialties',
    ];

    protected $casts = [
        'specialties' => 'array',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
