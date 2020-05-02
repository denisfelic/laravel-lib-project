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
        'name', 'email', 'username' ,  'password',
    ];

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
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //Plural pois relação é 1:n  (Um usuario tem muitos posts, e um post possui apenas um usuario);
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
