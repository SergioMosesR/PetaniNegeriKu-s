<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UndanganUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'undangan_id', 'is_read', 'read_at'];
    public function undangan()
    {
        return $this->belongsTo(Undangan::class);
    }
}
