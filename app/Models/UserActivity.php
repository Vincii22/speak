<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    // Fillable attributes
    protected $fillable = [
        'user_id',
        'exercise_id',
        'category_id',
        'day_id',
        'set_id',
        'media_file',
        'submitted_at',
        'marked_as_done',
        'marked_as_evaluated',
        'evaluation'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function set()
    {
        return $this->belongsTo(Set::class);
    }
}
