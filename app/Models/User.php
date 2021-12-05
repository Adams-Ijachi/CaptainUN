<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'password',
        'full_name',
        'country',
        'username',
        'email',
        'user_type',
        'is_approved',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // set password attribute hash
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    // check user type

    public function scopeRole($query,$type)
    {
        

        return $this->user_type == $type ? true : false;
    
    }

    public function scopeHasRole($query,$value)
    {
    
        return $query->where('user_type',$value);
    }


    public function getStatusAttribute()
    {
        # code...

        return [
            // return div

            '1' => ['gradient-1','Approved'],
            '0' => ['gradient-2','Pending'],
        ][$this->is_approved];

    }

    // search by full name or email

    public function scopeAdminSearch($query,$value)
    {
        return $value ?  $query->where('full_name','like','%'.$value.'%')->orWhere('email','like','%'.$value.'%')->orWhere('country','like','%'.$value.'%')->where('user_type',2) : $this->where('user_type',2);
    }
    public function scopeVolunteerSearch($query,$value)
    {
        return $value ?  $this->where('full_name','like','%'.$value.'%')->orWhere('email','like','%'.$value.'%')->orWhere('country','like','%'.$value.'%')->where('user_type',1) : $this->where('user_type',1);
    }

    
}
