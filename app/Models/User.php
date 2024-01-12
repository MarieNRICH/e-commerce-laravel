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
    protected $fillable = [
        'firstname',
        'lastname',
        'pseudo',
        'image',
        'address',
        'zipcode',
        'city',
        'phone_number',
        'email',
        'password',
        'role',
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

    // nom au pluriel car un user peut poster pls quacks
    // cardinalité 0,n
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    // nom au pluriel car un user peut poster pls comments
    // cardinalité 0,n
    public function products()
    {
        return $this->hasMany(Product::class);
    }   
    
    // nom au pluriel car un user peut poster pls comments
    // cardinalité 0,n
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // nom au pluriel car un user peut poster pls comments
    // cardinalité 0,n
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

}
