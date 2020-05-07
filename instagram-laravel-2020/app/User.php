<?php

/**
 * Esta classe representa uma linha no banco de dados (Um único usuário)
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username',  'password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                //title sera username por default;
                'title' => $user->username,
            ]);
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Singular pois a relação é de 1:1
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //Plural pois relação é 1:n  (Um usuario tem muitos posts, e um post possui apenas um usuario);
    public function posts()
    {
        //Tem muitos , ordenado de pela ordem de criação de forma decrescente, ou seja ira exbir
        // os mais recentes primeiro.
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }


    //Está seguindo muitos...
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }
}
