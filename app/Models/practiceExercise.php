<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PracticeExercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'practiceCategory_id', 'media_file'];

    public function category()
    {
        return $this->belongsTo(PracticeCategory::class);
    }
}
