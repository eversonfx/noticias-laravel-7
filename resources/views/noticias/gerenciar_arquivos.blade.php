<html>
       <head>
          <title>{{ config('app.name') }}</title>
          <script src="{{ asset('js/adm/jquery-1.11.1.min.js') }}"></script>
          <meta name="csrf-token" content="<?php echo csrf_token() ?>">
          <link href="{{ asset('css/adm/bootstrap.min.css') }}" rel="stylesheet">
          <link href="{{ asset('css/adm/font-awesome.min.css') }}" rel="stylesheet">
          <link href="{{ asset('css/adm/datepicker3.css') }}" rel="stylesheet">
          <link href="{{ asset('css/adm/styles.css') }}" rel="stylesheet">

          <link href="{{ asset('css/adm/customstyleadm.css') }}" rel="stylesheet">
          <script src="{{ asset('js/adm/bootstrap.min.js') }}"></script>
          
          <script type="text/javascript">
            var csrf_token   =   $('meta[name="csrf-token"]').attr('content');
            
            $.ajaxSetup({
              headers: {"X-CSRF-TOKEN": csrf_token}
            });
          </script>
       </head>
       <body onfocusout="closeFunction()">
       <div class="main container">
       <div class="panel panel-default">
        <div class="panel-heading">{{$noticia->titulo}}</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-11"><h4>Gerenciar Imagens</h4></div>
            <div class="col-md-1"><a class="float-right" href="javascript: window.close();"><i class="fa fa-window-close fa-3x"></i>Fechar</a></div>
          </div>
          <div id="msg" class="alert alert-success invisible-one" role="alert">
          </div>
          <div class="row">
          @forelse($noticia->arquivosnoticias as $arquivo)
            @php $fd = substr($arquivo->image, strpos($arquivo->image, ".") + 1); @endphp
            @if(isset($fd) && strcmp($fd,"pdf") == 0)
                @php $array_pdf[$arquivo->id] = $arquivo->image; @endphp
            @else
                <div class="col-md-4" id="imagem-arquivo-{{$arquivo->id}}">
                    <figure class="figure">
                            <img src={{ asset('uploads/atualizacao_projeto/'.$fd.'/'.$arquivo->image) }} class="figure-img img-fluid rounded img-caption-size" alt={{$noticia->titulo}}>
                            <figcaption class="figure-caption"><a href="#" onclick="adicionarExcluirImagem('{{$arquivo->id}}');"><i class="fa fa-minus-circle"></i> Excluir</a></figcaption>
                    </figure>
                </div>
            @endif
          @empty
          Sem imagens ainda
          @endforelse
        </div>
          <!-- Exibir PDF's  -->
        
        @if(isset($array_pdf))
        <div class="row">
          <div class="col-md-12"><h4>Gerenciar Documentos</h4></div>
          @foreach($array_pdf as $key=>$value)
          <div class="col-md-4" id="imagem-arquivo-{{$arquivo->id}}">
          <a href="{{ asset('uploads/atualizacao_projeto/'
          .$fd.'/'.$value) }}" target="_blank">{{ $value }}</a>
          <br>
          <a href="#" onclick="adicionarExcluirImagem('{{$key}}');"><i class="fa fa-minus-circle"></i> Excluir</a>
          </div>
          @endforeach
        </div>
        @endif
        </div>         
        </div>
    </div>
    </body>
    <script>
    function adicionarExcluirImagem(idim){
        $.ajax({
          type:'POST',
          url: "{{ route('projetos.atualizacaostatus.ajax.gerenciararquivos') }}",
          data:{id:idim},
          dataType:'json', 
          success:function(data){    
            $("#imagem-arquivo-"+idim).hide();        
            $("#msg").html(data.msg);
            $("#msg").show().delay(8000).fadeOut();
          },
          error:function(){
            alert('loading error...')
          }
        });
    }
</script>
</html>