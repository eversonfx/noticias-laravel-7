<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secao extends Model
{
    protected $table = 'secoes';
    
    public function noticias()
    {
        return $this->hasMany('App\Noticia');
    }
}
