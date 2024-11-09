<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'audio_file',
    ];

    // Define relationship with Level model
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
