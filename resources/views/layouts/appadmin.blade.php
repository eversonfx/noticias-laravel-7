<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->


    <!-- Styles -->
    <link href="{{ asset('css/adm/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adm/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adm/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adm/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('css/adm/customstyleadm.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

</head>

<body>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->

                <a class="navbar-brand" href="#"><span>CRUD Laravel - Notícias </span> Admin </a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a href="{{ route('admin.logout') }}">
                            <em class="fa fa-power-off"></em> Sair
                        </a>
                    </li>

                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">

            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    {{auth()->user()->name}}</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <!-- <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form> -->
        <ul class="nav menu">
            <li><a href="{{ route('admin.perfil') }}">Meu Perfil</a></li>

            <li><a class="" href="{{ route('secoes.listar') }}">
                    <span class="fa fa-arrow-right">&nbsp;</span> Seções
                </a></li>
            <li><a class="" href="{{ route('noticias.listar') }}">
                    <span class="fa fa-arrow-right">&nbsp;</span> Notícias
                </a></li>

        </ul>
    </div>
    <!--/.sidebar-->


    @yield('content')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="alert bg-info" role="alert">&copy; <span>everson_dev</span>
            </div>
        </div>
    </div>
    </div>
    <!--/.main-->

</body>

<!-- Scripts -->
<script src="{{ asset('js/adm/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('js/adm/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/adm/chart.min.js') }}"></script>
<script src="{{ asset('js/adm/chart-data.js') }}"></script>
<script src="{{ asset('js/adm/easypiechart.js') }}"></script>
<script src="{{ asset('js/adm/easypiechart-data.js') }}"></script>
<script src="{{ asset('js/adm/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/adm/custom.js') }}"></script>
<script src="{{ asset('js/adm/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/adm/bootstrap-datepicker.js') }}"></script>

@section('scripts')

@show




</html>