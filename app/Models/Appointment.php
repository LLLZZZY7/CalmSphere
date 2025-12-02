<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'therapist_id',
        'appointment_time',
        'status',
        'type',
    ];

    protected $casts = [
        'appointment_time' => 'datetime',
    ];

    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
