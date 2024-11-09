<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'level',
    ];

    // Define the relationship with Sound model
    public function sounds()
    {
        return $this->hasMany(Sound::class);
    }

    // Define the relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
