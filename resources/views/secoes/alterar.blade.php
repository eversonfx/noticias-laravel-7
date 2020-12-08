@extends('layouts.appadmin')


@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">
                    <em class="fa fa-home"></em>
                </a></li>

            <li><a href="{{ route('secoes.listar') }}">
                    Projetos
                </a></li>

            <li class="active">Alterar</li>
        </ol>
    </div>
    <!--/.row-->



    <div class="panel panel-default">
        <div class="panel-heading">Seções -Alterar</div>
        <div class="panel-body">
            <div class="col-md-6">
                <form role="form" id="form_alterar_projeto" action="{{ route('secoes.alterar') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$secao->id}}">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" id="nome" name="nome"
                            class="form-control  @error('nome') is-invalid @enderror" placeholder="Nome do Projeto"
                            value="{{ old('nome', $secao->nome ?? null) }}">
                        @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Alterar</button>
                </form>
            </div>
            <div class="col-md-6">


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
            // Liberar o campo de URL ou upload de arquivo após carregar a pagina
            if ($("#modoPublicacao").val() == "1") {
                $("#dvpdf").show();
                $("#dvurl").hide();
            } else if ($("#modoPublicacao").val() == "0") {
                $("#dvurl").show();
                $("#dvpdf").hide();
            }

            // Liberar o campo de URL ou upload de arquivo após o clique
            $("#modoPublicacao").change(function() {
                var option = $(this).val();

                if (option == "1") {
                    $("#dvpdf").show();
                    $("#dvurl").hide();

                    //Torna o campo obrigatório dependendo da opção
                    $("#file").attr("required", true);
                    $("#url").attr("required", false);
                } else if (option == "0") {
                    $("#url").val("");
                    $("#dvurl").show();
                    $("#dvpdf").hide();

                    //Torna o campo obrigatório dependendo da opção
                    $("#url").attr("required", true);
                    $("#file").attr("required", false);
                }
            });
        });
    </script>
    @stop