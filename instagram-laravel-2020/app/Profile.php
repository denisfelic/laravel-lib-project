<?php
/**
 * Todos os conteúdos do que o usuário possui.
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

 public function user(){

    return $this->belongsTo(User::class);

 }
}
