@extends('layouts.appadmin')


@section('content')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" />

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="{{ route('admin') }}">
          <em class="fa fa-home"></em>
        </a></li>

      <li><a href="{{ route('noticias.listar') }}">
          Notícias
        </a></li>

      <li class="active">Exibir</li>
    </ol>
  </div>
  <!--/.row-->



  @if(session('success'))
  <div class="alert alert-success margin-vertical">
    {{session('success')}}
  </div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger margin-vertical">
    {{session('error')}}
  </div>
  @endif



  <div class="panel panel-default">
    <div class="panel-heading">Notícia - Exibir</div>
    <div class="panel-body">
      <div class="col-md-6">
        <h4>{{ $noticia->titulo }}</h4>
        <strong>Tags: </strong>{{ $noticia->tags }}<br>
        <strong>Conteúdo: </strong>{!! $noticia->conteudo !!}<br>
        <strong>Autor: </strong>{{ $noticia->user->name }}<br>
        <strong>Criado: </strong> {{ $noticia->created_at ?
        $noticia->created_at->diffForHumans()
        : '' }}<br>
        <strong>Atualizado: </strong> {{ $noticia->updated_at ?
        $noticia->updated_at->diffForHumans()
        : '' }}
      </div>
      <div class="col-md-6">
        <div class="col-md-12">
          <!-- Link de Video -->
          @if(strlen($noticia->video_link) > 0)
          <strong>Vídeo</strong><br>{!! $noticia->video_link !!}
          @endif
        </div>
        <div class="col-md-12">
          <!-- Imagens -->
          <strong>Imagens: </strong><br>
          @forelse($noticia->arquivosnoticias as $arquivo)
          @php $fd = substr($arquivo->image, strpos($arquivo->image, ".") + 1);@endphp
          @if(isset($fd) && strcmp($fd,"pdf") == 0)
          @php $array_pdf[] = $arquivo->image; @endphp
          @else
          <img src={{ asset('uploads/noticias/'.$fd.'/'.$arquivo->image) }}
          alt={{$noticia->titulo}}
          class="img-new-show">
          @endif
          @empty
          Sem imagens ainda
          @endforelse
        </div>

        <div class="col-md-12">
          <!-- Exibir PDF's  -->
          @if(isset($array_pdf))

          <strong>Documentos: </strong><br>
          @foreach($array_pdf as $pdf_link)
          <a href="{{ asset('uploads/noticia/'
          .$fd.'/'.$pdf_link) }}" target="_blank">{{ $pdf_link }}</a>
          @endforeach

          @endif
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
  <script>
    $(document).ready(function() {
      $.noConflict();
      var table = $('#example').DataTable({
        lengthChange: false,
        language: {
          "sEmptyTable": "Nenhum registro encontrado",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
          "sInfoFiltered": "(Filtrados de _MAX_ registros)",
          "sInfoPostFix": "",
          "sInfoThousands": ".",
          "sLengthMenu": "_MENU_ resultados por página",
          "sLoadingRecords": "Carregando...",
          "sProcessing": "Processando...",
          "sZeroRecords": "Nenhum registro encontrado",
          "sSearch": "Pesquisar",
          "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
          },
          "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
          }
        }
      });
      table.buttons().container()
        .appendTo('#example_wrapper .col-sm-6:eq(0)');
    });
  </script>
  @stop

  @section('scripts')

  @stop