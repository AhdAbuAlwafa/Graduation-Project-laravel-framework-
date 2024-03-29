<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        
        'city_name',
        'village_name' 
    
        
    ];

    
    use HasFactory;
    public function user(){
        return $this->hasMany(User::class, 'address_id','id');
    }

    public function advertisement(){
        return $this->hasMany(Advertisement::class); 
    }
    
}
