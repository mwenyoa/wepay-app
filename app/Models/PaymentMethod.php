<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = ['payment_method_id', 'resource', 
    'create_time', 'expire_time', 'api_version', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
