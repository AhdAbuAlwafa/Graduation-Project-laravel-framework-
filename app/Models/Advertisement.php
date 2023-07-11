<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table='advertisements';
    protected $fillable=['adv_date', 'adv_req', 'job_des', 'work_hour', 'job_name', 'adv_period','work_period', 'is_worker', 'gender', 'user_id', 'address_id', 'updated_at', 'created_at'];
    protected $dates = ['expires_at'];

    public function addresses(){
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function users(){
        return $this->belongsTo(User::class); 
    }
}
