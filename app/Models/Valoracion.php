<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;

    public function valorador()
    {
        return $this->hasOne(User::class, 'id','valorador_id');
    }
    public function receptor()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
