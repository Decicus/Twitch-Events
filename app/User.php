<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * Indicates the column that is the primary key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the primary key is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'display_name', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $user
     * @return App\User
     */
    public static function findOrCreateUser($user)
    {
        if ($auth = User::where(['id' => $user->id])->first()) {
            return $auth;
        }

        return User::create([
            'id' => $user->id,
            'username' => $user->name,
            'display_name' => $user->nickname
        ]);
    }
}
