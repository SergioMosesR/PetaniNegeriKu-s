<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image'];
    public function DetailKomunitas()
    {
        return $this->hasMany(DetailKomunitas::class, 'id_komunitas');
    }
}
