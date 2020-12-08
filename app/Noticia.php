<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Noticia extends Model
{
    protected $table = 'noticias';

    public $with = ['secoes','arquivosnoticias'];

    protected $fillable = ['_token','id', 'titulo', 'tags', 'destaque', 'conteudo', 'main_image', 'secao_id', 'user_id'];

    public function secoes()
    {
        return $this->belongsTo('App\Secao', 'secao_id', 'id');
    }

    public function arquivosnoticias()
    {
        return $this->hasMany('App\ArquivosNoticia');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getVideoLinkAttribute($value)
    {
        $embed = Embed::make($value)->parseUrl();

        if (!$embed) {
            return '';
        }

        $embed->setAttribute(['width' => 400]);
        return $embed->getHtml();
    }

    public function getOriginalVideoLinkAttribute()
    {
        return $this->attributes['video_link'];
    }
}
