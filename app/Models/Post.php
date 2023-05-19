<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'category_id', 'author'];
    public $timestamp = true;

    public function category() {
        return $this->belongsTo(Categories::class);
    }
}
