<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SLACS - Serviço Livre de Apoio ao Controle Social</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{asset('css/scrolling-nav.css')}}" rel="stylesheet">
    <link href="{{asset('css/full.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body class="full">

    
    <div id="app">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="{{url('/')}}">SLACS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Dados no portal</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Controle Social</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Quero colaborar</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Consultas <span class="caret"></span>
                                </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('cidadao.consulta-licitacoes')}}" title="Licitações">Licitações</a></li>
                            <li><a href="{{route('cidadao.consulta-contratos')}}" title="Contratos">Contratos</a></li>
                            <li><a href="{{route('cidadao.consulta-estatisticas')}}" title="Estatísticas">Estatísticas</a></li>
                            <li><a href="{{route('cidadao.historicos_de_acesso')}}" title="Monitoramentos">Monitoramentos</a></li>
                            <li><a href="{{route('cidadao.consulta-api')}}" title="API">API</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right">
                        <a href="{{route('login')}}" title="login">Acesso de colaborador</a>
                    </li>
                    <li class="pull-right">
                        <a href="{{url('cidadao/login')}}" title="login">Acesso de Cidadão</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    </div>
    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/scrolling-nav.js')}}"></script>
{{-- 
    <script src="{{asset('/plugins/jquery-maskmoney/jquery.maskMoney.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mascaras.js')}}"></script>     --}}
    
    {{-- <script src="{{asset('plugins/collectjs/index.js')}}"></script> --}}

    <!-- Scripts -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>   
    @yield('content')

    

</body>

</html>