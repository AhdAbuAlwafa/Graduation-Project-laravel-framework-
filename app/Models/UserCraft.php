<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCraft extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table='craft_user';
    protected $fillable=['user_id','craft_id'];

}
