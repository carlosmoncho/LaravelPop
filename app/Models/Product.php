<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasOne(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mensaje()
    {
        return $this->hasMany(Mensaje::class);
    }
    public function imagen()
    {
        return $this->hasMany(Imagen::class);
    }
    public function denunciaA()
    {
        return $this->belongsTo(DenunciaA::class);
    }
    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class,'etiqueta_product');
    }
}
