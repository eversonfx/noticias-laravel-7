@extends('layouts.appadmin')


@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Home</li>
        </ol>
    </div>
    <!--/.row-->


    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif



    <div class="panel panel-default">
        <div class="panel-heading">Administrador</div>
        <div class="panel-body">
            Bem vindo a Área do Administrador
        </div>
    </div>

    @stop

    @section('scripts')

    @stop