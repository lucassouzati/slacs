@extends('modulo-cidadao.layouts.app2')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Acessando dados via API</h1></div>
                    <div class="panel-body">
                        <p>Para acessar os dados através de API (Applicaton Interface Programing), é necessário realizar requisições para URL específica do dado que deseja acessar. A seguir, encontra-se um guia de acesso de acordo com o dado solicitado, com os possíveis filtros.</p>
                        <h2>Entes Públicos</h2>
                        <p>Fornece uma lista dos Entes Públicos cadastrados no site.</p>
                        <p>URL: <a href="{{route('cidadao.api-entes')}}" title="Consultar Entes Via API"><code>{{route('cidadao.api-entes')}}</code></a></p>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-6">
                        <h2>Licitações</h2>
                        <p>Fornece uma lista dos Licitações cadastradas no site.</p>
                        <p>URL: <a href="{{route('cidadao.api-licitacoes')}}" title="Consultar Licitações Via API"><code>{{route('cidadao.api-licitacoes')}}</code></a></p>
                        
                                <h3>Filtros</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Campo</th>
                                                <th>Tipo</th>
                                                <th>Obrigatório</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ente_id</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>modalidade</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>situacao</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>criterio</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>objeto</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>valor_minimo</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>valor_maximo</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>cnpj_cpf</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                            <tr>
                                                <td>descricao_itens</td>
                                                <td>Texto</td>
                                                <td>Não</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-6">
                                <h2>Itens de Licitação</h2>
                                <p>Fornece uma lista de itens de licitação cadastrados no site.</p>
                                <p>URL: <a href="{{route('cidadao.api-itens_licitacao', "ID")}}" title="Consultar Itens de Licitação Via API"><code>{{route('cidadao.api-itens_licitacao', "ID")}}</code></a></p>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h2>Contratos</h2>
                                <p>Fornece uma lista de Contratos cadastrados no site.</p>
                                <p>URL: <a href="{{route('cidadao.api-contratos')}}" title="Consultar Contratos Via API"><code>{{route('cidadao.api-contratos')}}</code></a></p>
                                <h3>Filtros</h3>
                                
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Campo</th>
                                                    <th>Tipo</th>
                                                    <th>Obrigatório</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>ente_id</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>processo</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>numero_contrato</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>tipo</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>cnpj_cpf</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>fornecedor</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>descricao</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>valor_minimo</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>valor_maximo</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                                <tr>
                                                    <td>descricao_itens</td>
                                                    <td>Texto</td>
                                                    <td>Não</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <br>
                                <br>
                                <h2>Itens do Contrato</h2>
                                <p>Fornece uma lista de itens de contratos cadastrados no site.</p>
                                <p>URL: <a href="{{route('cidadao.api-itens_contrato', "ID")}}" title="Consultar Itens de Licitação Via API"><code>{{route('cidadao.api-itens_contrato', "ID")}}</code></a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection