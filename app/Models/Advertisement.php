<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table='advertisements';
    protected $fillable=['job_des','work_hour','job_name','address_id','gender','work_period','adv_req'];

    public function addresses(){
        return $this->belongsTo(Address::class); 
    }

    public function users(){
        return $this->belongsTo(User::class); 
    }
}
