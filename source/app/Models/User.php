<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'fullname',
        'email',
        'password',
        'id_user_group'
    ];

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
        'password' => 'hashed',
    ];

     /**
    *  Return a key value array, containing any custom claims to be added to the JWT.
    */
    public function getJWTIdentifier(){
        return $this->getkey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     */
    public function getJWTCustomClaims(){
        return [];
    }

    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'id_user_group');
    }

    public function isAdmin()
    {
        return $this->group && $this->group->title_user_group === 'Administrator';
    }

    public function isSupporter()
    {
        return $this->group && $this->group->title_user_group === 'Supporter';
    }
}
