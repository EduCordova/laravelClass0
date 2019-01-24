<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /*
        LLAMAR A LA TABLA IF...
        protected $table = 'users'; name of table
    */
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function profession() // id default | id_profession edit
    {
        //belong -> pertenecer
        return $this->belongsTo(Profession::class);
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }
}
