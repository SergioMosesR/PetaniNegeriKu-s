<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostKomunitas extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image', 'id_komunitas', 'id_user'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_komunitas'); 
    }
}
