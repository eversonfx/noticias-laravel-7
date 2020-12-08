@extends('layouts.appadmin')


@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">
                    <em class="fa fa-home"></em>
                </a></li>

            <li class="active">Meu Perfil</li>
        </ol>
    </div>
    <!--/.row-->



    <div class="panel panel-default">
        <div class="panel-heading">Meu Perfil</div>
        <div class="panel-body">
            <div class="col-md-5">
                <form role="form" id="form_insere_usuario" action="{{ route('admin.perfil.alterar') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$usuario->id}}" />
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" id="name" name="name"
                            class="form-control  @error('name') is-invalid @enderror" placeholder="Nome do Usuário"
                            value="{{ old('name', $usuario->name ?? null) }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email do Usuário"
                            value="{{ old('email', $usuario->email ?? null) }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password" value="{{ old('password', $usuario->password ?? null) }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password" value="{{ old('password', $usuario->password ?? null) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Alterar</button>

            </div>
            <div class="col-md-7">
            </div>
        </div>
    </div>
    @stop

    @section('scripts')
    @stop