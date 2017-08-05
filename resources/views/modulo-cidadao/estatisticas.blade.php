@extends('modulo-cidadao.layouts.app2')

@section('content')

    <div class="container">
        <div class="row">
            
             <div class="panel panel-default">
                    <div class="panel-heading">Filtros</div>

                    {{-- <div class="panel-body">
                        {!! Form::open(['url' => route('cidadao.consulta-licitacoes'), 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Ente Público: </label>
                                            {!! Form::select('ente_id', \App\Ente::pluck('nome', 'id')->put('', 'Todos'), '', ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="modalidade" class="control-label">Modalidade: </label>
                                            {!! Form::text('modalidade', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="situacao" class="control-label">Situacao: </label>
                                            {!! Form::text('situacao', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>

                                </div>
                                <div class="col-md-12">
                                	<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Valor Mínimo: </label>
                                            {!! Form::number('valor_minimo', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Valor Máximo: </label>
                                            {!! Form::number('valor_maximo', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="situacao" class="control-label">Critério: </label>
                                            {!! Form::text('criterio', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="situacao" class="control-label">CNPJ/CPF: </label>
                                            {!! Form::text('cnpj_cpf', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                	<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Objeto: </label>
                                            {!! Form::text('objeto', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ano" class="control-label">Que contenham nos itens: </label>
                                            {!! Form::text('descricao_itens', null, ['class' => 'form-control']) !!}
                                        </div>    
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="col-md-offset-10 col-md-2">
                                        <div class="form-group">
                                            {!! Form::submit('Pesquisar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                    </div> --}}
            </div>
{{-- 
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Valor apurado em Licitação por Ente Público</div>
                    <div class="panel-body">
                        
                    </div>

                </div>
            </div> --}}
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Valor apurado em Contratos por Ente Público</div>
                    <div class="panel-body">
                        
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">10 itens mais caros de cada ente público</div>
                    <div class="panel-body">
                        
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Quantidade de acessos bem sucedidos de cada ente público</div>
                    <div class="panel-body">
                        
                    </div>

                </div>
            </div>


        </div>
    </div>
 <script type="text/javascript">
 function gerarGraficos(data){
    console.log(data);
 }
 function carregarDados(){
    $.ajax({
    url: '{{route('cidadao.api-contratos')}}',
    success: function (data) {
        // faça o tratamento dos dados e atualize
        // as variáveis dos gráficos.

        dataBar = data;

        gerarGraficos(dataBar);
    }
    });
}
$(document).ready(function(){
    carregarDados();

});

 </script>
 
@endsection