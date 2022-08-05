<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersEmpresas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'empresa_id'
    ];

    public function empresa() {
        return $this->belongsTo(Empresas::class);
    }

    public function usuario() {
        return $this->belongsTo(User::class);
    }
}
