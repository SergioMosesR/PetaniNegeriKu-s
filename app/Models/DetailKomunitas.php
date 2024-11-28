<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKomunitas extends Model
{
    use HasFactory;
    protected $fillable = ['id_komunitas', 'id_user', 'role'];
}
