<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['set_id', 'name'];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
