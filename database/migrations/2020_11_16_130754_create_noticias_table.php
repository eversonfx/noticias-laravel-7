<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->default('');

            $table->timestamps();
        });

        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->default('');
            $table->string('tags')->nullable();
            $table->integer('destaque')->default(0);
            $table->longText('conteudo');
            $table->string('video_link')->nullable();
            $table->integer('main_image')->nullable();

            $table->unsignedBigInteger('secao_id')->index();
            $table->foreign('secao_id')->references('id')->on('secoes')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });

        Schema::create('arquivos_noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');

            $table->unsignedBigInteger('noticia_id')->index();
            $table->foreign('noticia_id')->references('id')->on('noticias')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivos_noticias');
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('secoes');
    }
}
