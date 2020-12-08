<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivosNoticia extends Model
{
    protected $table = 'arquivos_noticias';

    public function noticia()
    {
        return $this->belongsTo('App\Noticia');
    }
}
