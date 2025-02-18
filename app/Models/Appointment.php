<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'month',
        'day',
        'year',
        'time',
        'status',
        'contact',
        'contact_email',
        'schedule_id',
        'google_meet_link',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
