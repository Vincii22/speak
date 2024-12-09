<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'month',
        'day',
        'year',
        'time',
        'speech_language_pathologist',
        'email',
        'contact',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
