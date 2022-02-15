<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function producto()
    {
        return $this->hasMany(Product::class,'user_id','id');
    }
    public function productosComprados()
    {
        return $this->hasMany(Product::class,'comprador_id','id');
    }
    public function DenunciasM()
    {
        return $this->hasMany(DenunciaM::class,'user_id','id');
    }
    public function DenunciasA()
    {
        return $this->hasMany(DenunciaA::class,'user_id','id');
    }
    public function valoracion()
    {
        return $this->hasMany(Valoracion::class, 'user_id', 'id');
    }
}
