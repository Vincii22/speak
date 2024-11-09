<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }
}
