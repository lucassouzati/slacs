@extends('modulo-cidadao.layouts.app2')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Licitaco {{ $licitacao->id }}</div>
                    <div class="panel-body">

                        

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $licitacao->id }}</td>
                                    </tr>
                                    <tr><th> Ente Público </th><td> {{ $licitacao->ente->nome }} </td></tr>
                                    <tr><th> Unidade Gestora </th><td> {{ $licitacao->unidade_gestora }} </td></tr>
                                    <tr><th> Número de processo </th><td> {{ $licitacao->num_proc }} </td></tr>
                                    <tr><th> Modalidade </th><td> {{ $licitacao->modalidade }} </td></tr>
                                    <tr><th> Tipo </th><td> {{ $licitacao->modalidade }} </td></tr>
                                    <tr><th> Situação </th><td> {{ $licitacao->situacao }} </td></tr>
                                    <tr><th> Data de julgamento </th><td> {{ $licitacao->data_julgamento }} </td></tr>
                                    <tr><th> Data de homologação </th><td> {{ $licitacao->data_homologacao }} </td></tr>
                                    <tr><th> Objeto </th><td> {{ $licitacao->objeto }} </td></tr>
                                    <tr><th> Valor </th><td> {{ $licitacao->valor }} </td></tr>
                                    <tr><th> Critério </th><td> {{ $licitacao->criterio }} </td></tr>
                                    <tr><th> Prazo de execução </th><td> {{ $licitacao->prazo_execucao }} </td></tr>
                                    <tr><th> Tipo de cadastro </th><td> {{ $licitacao->tipo_cadastro }} </td></tr>
                                    <tr><th> Situação do cadastro </th><td> {{ $licitacao->situacao_cadastro }} </td></tr>
                                    <tr><th> Criado por </th><td> {{ $licitacao->colaborador_criou->nome }} </td></tr>
                                    <tr><th> Validado por </th><td> {{ isset($licitacao->colaborador_validou) ? $licitacao->colaborador_validou->nome : "" }} </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Itemlicitacao</div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Item</th><th>Descricao</th><th>Quantidade</th><th>Unidade Medida</th><th>Valor Unitario</th><th>Valor Proposta Vencedora</th><th>Valor Total</th><th>Licitacao Id</th><th>Tipo Pessoa Fisica</th><th>Cnpj Cpf Vencedor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($licitacao->itensLicitacao as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->item }}</td><td>{{ $item->descricao }}</td><td>{{ $item->quantidade }}</td><td>{{ $item->unidade_medida }}</td><td>{{ $item->valor_unitario }}</td><td>{{ $item->valor_proposta_vencedora }}</td><td>{{ $item->valor_total }}</td><td>{{ $item->licitacao_id }}</td><td>{{ $item->tipo_pessoa_fisica }}</td><td>{{ $item->cnpj_cpf_vencedor }}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
