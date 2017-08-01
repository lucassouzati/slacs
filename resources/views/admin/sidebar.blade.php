<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Sidebar
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/home') }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('colaboradores.index') }}">
                        Colaboradores
                    </a>
                </li>
                <li>
                    <a href="{{ route('entes.index') }}">
                        Entes Públicos
                    </a>
                </li>
                <li>
                    <a href="{{ route('licitacoes.index') }}">
                        Licitações
                    </a>
                </li>
                <li>
                    <a href="{{ route('contratos.index') }}">
                        Contratos
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Importações <span class="caret"></span>
                                </a>
                    <ul class="dropdown-menu" role="menu">
                        
                        <li>
                            <a href="{{ route('contratos.formImportar') }}">
                                Contratos
                            </a>
                        </li>   
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
