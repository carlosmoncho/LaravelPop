<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaM extends Model
{
    use HasFactory;
    protected $table = 'denuncia_m';
    public function mensaje()
    {
        return $this->hasOne(Mensaje::class, 'id','mensaje_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
