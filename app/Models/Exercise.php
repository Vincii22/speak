<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'media_url', 'media_file'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
