<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function etiquetas()
    {
        return $this->belongsToMany(Product::class,'etiqueta_product');
    }
}
