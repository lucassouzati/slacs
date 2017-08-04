<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Menu
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/home') }}">
                        Home
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
                    <a href="#">
                        Monitorações
                    </a>
                </li>
                <li>
                    {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Importações <span class="caret"></span>
                                </a>
                    <ul class="dropdown-menu" role="menu">
                        
                        <li>
                            <a href="{{ route('contratos.formImportar') }}">
                                Contratos
                            </a>
                        </li>   
                    </ul> --}}
                    <a href="{{ route('contratos.formImportar') }}">
                                Importações
                            </a>
                </li>   
                @can('isAdmin')
                <li>

                    <a href="{{ route('colaboradores.index') }}">
                        Colaboradores
                    </a>
                </li>
                <li>

                    <a href="#">
                        Configurações
                    </a>
                </li>
                @endcan

            </ul>
        </div>
    </div>
</div>
