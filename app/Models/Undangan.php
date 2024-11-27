<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'content', 'penyelenggara', 'waktu', 'tempat', 'image'];
}
