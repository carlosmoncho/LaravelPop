<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaA extends Model
{
    use HasFactory;
    protected $table = 'denuncia_a';
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
