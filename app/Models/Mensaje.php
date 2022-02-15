<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function denunciaM()
    {
        return $this->hasOne(DenunciaM::class);
    }
    public function emisor()
    {
        return $this->hasOne(User::class,'id','emisor_id');
    }
    public function receptor()
    {
        return $this->hasOne(User::class,'id','receptor_id');
    }
}
