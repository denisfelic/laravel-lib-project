<?php
/**
 * Todos os conteúdos do que o usuário possui.
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    //Retorna imagem de perfil
public function profileImage(){
    //Caso tenha a imagem, retornaram a img, caso não retornara a default picture
    //condição ? codigoUm : codigoDois;
    $Imagepatch = '/storage/profile/amukA2CYuSVRBCQaOAVPfU25fiRPOTJEj0ygLUvG.jpeg';
    if($this->image){
        $Imagepatch = '/storage/'. $this->image;
    }

    return $Imagepatch;

}

 public function user(){

    return $this->belongsTo(User::class);

 }
}
