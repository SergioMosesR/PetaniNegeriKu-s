<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelanjaan extends Model
{
    use HasFactory;
    protected $fillable = ['id_penjual', 'id_pembeli', 'id_post', 'unit', 'qty', 'grandtotal', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pembeli');
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
