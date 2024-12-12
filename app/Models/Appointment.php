<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
