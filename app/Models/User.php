<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function phones()
    {
        return $this->hasMany("App\Models\Phone","user_id",'id');
    }

    public function latestPhone()
    {
        return $this->hasOne("App\Models\Phone","user_id",'id')->latestOfMany();
    }

    public function oldestPhone()
    {
        return $this->hasOne("App\Models\Phone","user_id",'id')->oldestOfMany();
    }

    public function activePhone()
    {
        return $this->hasOne("App\Models\Phone","user_id",'id')->ofMany([
            'published_at' => 'max',
            'id' => 'max'],
            function($query) {
                $query->where('published_at','<',now());
            });
    }

    public function car()
    {
        return $this->hasOne("App\Models\Car","user_id",'id');
    }

    public function carCompany()
    {
        return $this->hasOneThrough("App\Models\CarCompany","App\Models\Car","user_id",'car_id','id','id');
    }
}
