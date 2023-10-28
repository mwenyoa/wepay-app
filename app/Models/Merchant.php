<?php
namespace App\Models;

use App\Models\User;
use App\Models\Legal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory;

    protected $table = 'merchants';

    protected $fillable = [
        'legal_entity_id', 
        'user_id', 'name', 'description',
        'account_id'
    ];


    // If you have JSON fields, you can cast them as arrays
    // protected $casts = [
    //     'address' => 'json',
    //     'entity_country_info' => 'json',
    //     'controller' => 'json',
    //     'additional_representatives' => 'json',
    // ];

    // You can define relationships with other models here if needed
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function legal(){
        return $this->belongsTo(Legal::class);
    }
}
