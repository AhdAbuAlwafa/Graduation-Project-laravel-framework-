<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $fillable=['fname','lname','number','image','password','description','num_evl','all_evl','gender','is_worker','address_id'];


    public function addresses()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function crafts(){
        return $this->belongsToMany(Craft::class);
   }

     public function advertisements(){
    return $this->hasMany(Advertisement::class);
}

public function evaluations()
{
    return $this->hasMany(UserEvaluation::class, 'worker_id');
}

public function comments()
{
    return $this->hasMany(User_Comment::class, 'user_id');
}

public function receivedComments()
{
    return $this->hasMany(User_Comment::class, 'worker_id');
}
public function rates(){
    return $this->hasMany(Rate::class,'reviewable');
}



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
}
