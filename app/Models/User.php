<?php

namespace App\Models;

use App\Models\Legal;
use App\Models\Merchant;
use App\Models\PaymentMethod;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname', 
        'lastname',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function legal(){
        return $this->hasOne(Legal::class);
    }

    public function payMethods(){
        return $this->hasMany(PaymentMethod::class);
    }
}
