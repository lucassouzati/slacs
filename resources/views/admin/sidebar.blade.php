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
            </ul>
        </div>
    </div>
</div>
