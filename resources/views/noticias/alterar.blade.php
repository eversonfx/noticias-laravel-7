@extends('layouts.appadmin')


@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">
                    <em class="fa fa-home"></em>
                </a></li>

            <li><a href="{{ route('noticias.listar') }}">
                    Atualização de Status dos Projetos
                </a></li>

            <li class="active">Alterar</li>
        </ol>
    </div>
    <!--/.row-->



    <div class="panel panel-default">
        <div class="panel-heading">Notícias - Alterar</div>
        <div class="panel-body">
            <div class="col-md-4">
                <form role="form" id="form_insere_atualizacao_projeto" action="{{ route('noticias.alterar') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$noticia->id}}" />
                    <div class="form-group">
                        <label>Projeto Vinculado</label>
                        <select name="secao_id" id="secao_id" class="form-control">
                            <option disabled selected>Selecione o projeto</option>
                            @foreach($secoes as $secao)
                            <option value="{{ $secao->id }}" @if ($noticia->secao_id == $secao->id) {{
                                'selected' }}
                                @endif>
                                {{$secao->nome}}</option>
                            @endforeach
                        </select>
                        @error('secao_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" id="titulo" name="titulo"
                            class="form-control  @error('titulo') is-invalid @enderror" placeholder="Título da Notícia"
                            value="{{ old('titulo', $noticia->titulo ?? null) }}">
                        @error('titulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <input type="text" id="tags" name="tags" class="form-control" placeholder="Tags da Notícia"
                            value="{{ old('tags', $noticia->tags ?? null) }}">
                        @error('tags')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>


            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label>Conteúdo</label>
                    <textarea class="summernote form-control" id="conteudo" name="conteudo"
                        class="form-control @error('conteudo') is-invalid @enderror" placeholder="Conteúdo da Notícia"
                        rows="10">{{ old('conteudo', $noticia->conteudo ?? null) }}</textarea>
                    @error('conteudo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Vídeo</label>
                    <input type="text" id="video_link" name="video_link" class="form-control"
                        placeholder="Cole o link do vídeo neste campo"
                        value="{{ old('video_link', $noticia->originalVideoLink ?? null) }}">
                    @error('video_link')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Imagens / Documentos</label>
                    <input type="file" class="form-control" name="files[]" multiple />
                    @error('files')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong></span>
                    @enderror
                    @error('files.*')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Alterar</button>
                </form>
            </div>
        </div>
    </div>
    @stop

    @section('scripts')

    <!-- Summernote  -->
    <link rel="stylesheet" href="{{ asset('js/wysiwyg-editor-summernote/dist/summernote-bs4.css') }}" />
    <script src="{{ asset('js/wysiwyg-editor-summernote/dist/summernote-bs4.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/wysiwyg-editor-summernote/dist/summernote.css') }}" />
    <script src="{{ asset('js/wysiwyg-editor-summernote/dist/summernote.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/wysiwyg-editor-summernote/dist/summernote-lite.css') }}" />
    <script src="{{ asset('js/wysiwyg-editor-summernote/dist/summernote-lite.js') }}"></script>

    <script src="{{ asset('js/wysiwyg-editor-summernote/dist/lang/summernote-pt-BR.js') }}"></script>
    <!-- Summernote  -->

    <script>
        $('.summernote').summernote({
            lang: 'pt-BR',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'help']]
            ],
        });

        $(document).ready(function() {

        });
    </script>
    @stop