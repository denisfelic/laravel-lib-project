<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $guarded = []; //Ok laravel, pode libear o acesso a POST;


    public function user(){
        return $this->belongsTo(User::class);
    }
}
