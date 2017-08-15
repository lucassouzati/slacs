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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">SLACS</a>
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
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right">
                        <a href="{{route('login')}}" title="login">Acesso de Colaborador</a>
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

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="nome_slacs">S L A C S</h1>
                    <p class="subtitulo">Serviço Livre de Apoio ao Controle Social</p>
                  {{--   <a class="btn btn-default page-scroll" href="#about">Click Me to Scroll Down!</a> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section ">
        <div class="container" id="counter">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="topicos">Dados no portal</h1>
                    <div class="col-lg-4">
                        <h2 class="topicos">Entes fiscalizados</h2>
                        <h2 class="topicos counter-value" data-count="{{$qtd['entes']}}">0</h2>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="topicos">Itens</h2>
                        <h2 class="topicos counter-value" data-count="{{$qtd['itens']}}">0</h2>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="topicos">Monitoramentos</h2>
                        <h2 class="topicos counter-value" data-count="{{$qtd['historicos_de_acesso']}}">0</h2>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="topicos">Controle Social</h1>
                    <p class="textos"> Apesar do Brasil possuir uma legislação robusta referente a transparência pública, muitos órgãos não cumprem essas leis, principalmente os da esfera municipal. A fiscalização de órgãos competentes não garantiu que os entes públicos fiscalizados mantivessem seus sites institucionais atualizados com informações obrigatórias. Tal fato somado com a inércia do brasileiro perante aos descaso de seus governantes, indica a necessidade de iniciativas alternativas de fiscalizações. </p>
                    <p class="textos">Nesse cenário, surge o SLACS, ferramenta que visa suprir a carência de dados abertos referentes a entes públicos municipais e difundir a cultura de Controle Social local com a disponibilização em formato aberto e pradronizado, dados referente a entes públicos municipais .</p>
                    {{-- A cada dia que se passa, o brasileiro presencia tantos casos de corrupção envolvendo seus governantes, chegando ao ponto de muitos se acomodarem. A acomodação destes nos incomoda. Enquanto a maioria acompanha pela mídia escândos na capital do país, se esquecem que nas portas de sua casa também tem dinheiro público sendo desviado. --}}
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="topicos">Quero colaborar</h1>
                    <p class="textos">Vocẽ pode colaborar de diversas formas. Entre em contato com o e-mail lucassouza.ti@gmail.com para maiores informações.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <script type="text/javascript">
        var a = 0;
          $(window).scroll(function() {

          var oTop = $('#counter').offset().top - window.innerHeight;
          if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function() {
              var $this = $(this),
                countTo = $this.attr('data-count');
              $({
                countNum: $this.text()
              }).animate({
                  countNum: countTo
                },

                {

                  duration: 5000,
                  easing: 'swing',
                  step: function() {
                    $this.text(Math.floor(this.countNum));
                  },
                  complete: function() {
                    $this.text(this.countNum);
                    //alert('finished');
                  }

                });
            });
            a = 1;
          }

        });
        
    </script>

</body>

</html>
