<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioAttempt extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'level_id', 'video_file',];

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with the Level model (one AudioAttempt belongs to one Level)
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // Relationship with UserProgress (an AudioAttempt has many UserProgress)
    public function userProgress()
    {
        return $this->hasMany(UserProgress::class, 'audio_attempt_id');
    }
}
