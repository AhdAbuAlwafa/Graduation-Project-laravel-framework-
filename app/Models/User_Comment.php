<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Comment extends Model
{
    protected $table= "user_comments";
    protected $fillable = ['com_text'];
    use HasFactory;
}
