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
        'video_file',
        'video_link',
    ];

    // Define relationship with Level model
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
