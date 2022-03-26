<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Nome da tabela no DB
    protected $table = 'post';

    //chamando o models User para vincular o ID do usuário as publicações
    //também será preciso criar uma função parecida no model User
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
