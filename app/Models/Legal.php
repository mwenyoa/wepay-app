<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Legal extends Model
{
    use HasFactory;
    protected $table = 'legals';


    protected $fillable = [
           'user_id',
           'legal_entity_id', 
           'resource_name',
            'created_time',
            'path'
        // Add fillable attributes for additional representatives if needed
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
