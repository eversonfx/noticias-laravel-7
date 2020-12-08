@extends('layouts.appadmin')


@section('content')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" />

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Seções</li>
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
        <div class="panel-heading">Seções</div>
        <div class="panel-body">

            <a class="btn btn-lg btn-default margin-vertical" href="{{ route('secoes.adicionar') }}"><span
                    class="fa fa-plus fa-2x"></span>
                Inserir</a>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($secoes as $secao)
                    <tr>
                        <td>{{ $secao->id }}</td>
                        <td>{{ substr($secao->nome, 0, 70) }}
                            @if(strlen($secao->nome) > 70)
                            [...]
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" title="Alterar"
                                href="{{ route('secoes.atualizar',  $secao->id) }}"><i class="fa fa-edit"></i></a>

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#modalnoticia-{{$secao->id}}"><i class="fa fa-trash"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalnoticia-{{$secao->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Confirmar Exclusão</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza que deseja excluir o Projeto:
                                            <strong>{{ $secao->titulo
                                                }}</strong> ?
                                            <h6>Todas as atualizações vinculadas ao projeto também serão excluídas</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-primary"
                                                href="{{ route('secoes.excluir',  $secao->id) }}">Confirmar</a>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
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