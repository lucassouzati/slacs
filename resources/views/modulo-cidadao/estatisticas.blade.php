@extends('modulo-cidadao.layouts.app2')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Valor apurado em Contratos por Ente Público</div>
                    <div class="panel-body">
                        <canvas id="chartContratos" width="400" height="200"></canvas>    
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">10 itens mais caros de cada ente público</div>
                    <div class="panel-body">    
                        <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ano" class="control-label">Ente Público: </label>
                                        {!! Form::select('ente_id', \App\Ente::pluck('nome', 'id'), '', ['class' => 'form-control', 'onchange' => 'carregaDadosItensMaisCaros(this.value)', 'id' => 'selectItensMaisCaros']) !!}
                                    </div>    
                                </div>
                            </div>
                            <canvas id="chartItensMaisCaros"></canvas>    
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Quantidade de acessos bem sucedidos de cada ente público</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ano" class="control-label">Ente Público: </label>
                                    {!! Form::select('ente_id', \App\Ente::pluck('nome', 'id'), '', ['class' => 'form-control', 'onchange' => 'carregaDadosHistoricoDeAcesso(this.value)', 'id' => 'selectHistoricoDeAcesso']) !!}
                                </div>    
                            </div>
                        </div>
                        <canvas id="chartHistoricoDeAcesso" width="400" height="200"></canvas>    
                    </div>

                </div>
            </div>


        </div>
    </div>
 <script type="text/javascript">
 function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
 function geraGraficoTotalContratoPorEnte(dados){
    console.log(dados);

    var data=[];
    data['labels']=[];
    data['datasets']=[];
    data['datasets'][0]={
        data: [],
        backgroundColor: getRandomColor(),
        // labels: [],
        // borderColor: "rgba(0,0,0,0)",
        label: 'Total do Ente',
        borderWidth: 1,
    };
    for (i=0;i<dados.length;i++){
        el=dados[i];
        data['labels'][i]=el.nome;
        // data['datasets'][0].labels[i]=el.nome;
        data['datasets'][0].data[i]=el.total;
        // data['datasets'][0].backgroundColor[i]=getRandomColor();
        // data['datasets'][0].borderWidth[i]=1;
    }
    console.log(data);
    var chartContratos = document.getElementById("chartContratos");
    var dadosContratos = new Chart(chartContratos, {
        type: 'bar',
        data: data
    });
 }

 function geraGraicoHistoricoDeAcesso(dados){
    console.log(dados);
    console.log(dados[0].licitacoes);
    console.log(dados[0].contratos);
    console.log(dados[0].transparencia);

    var data=[];
    // data['labels']=[];
    // data['datasets']=[];
    // data['datasets'][0]={
    //     data: [],
    //     backgroundColor: [],
    //     // label: [],
    //     // borderColor: "rgba(0,0,0,0)",
    //     label: 'Total de Acesso',
    //     borderWidth: [],
    // };
    // for (i=0;i<dados.length;i++){
    //     el=dados[i];
    //     data['labels'][i]=el.nome;
    //     data['datasets'][0].label[i]=el.nome;
    //     // data['datasets'][0].data[i]=el.total;
    //     data['datasets'][0].backgroundColor[i]=getRandomColor();
    //     data['datasets'][0].borderWidth[i]=1;
    // }

    data = {
        labels: ['Licitações', 'Contratos', 'Transparência'],
        datasets: [
        {
            label: 'Total de acessos bem sucedidos por ente público',
            backgroundColor: getRandomColor(),
            data: [dados[0].licitacoes, dados[0].contratos, dados[0].transparencia]
        }
        ]
    }
    console.log(data);
    var chartContratos = document.getElementById("chartHistoricoDeAcesso");
    var dadosContratos = new Chart(chartContratos, {
        type: 'bar',
        data: data
    });
 }
 function geraGraficoItensMaisCaros(dados){
    console.log(dados);

    var data=[];
    data['labels']=[];
    data['datasets']=[];
    data['datasets'][0]={
        data: [],
        // backgroundColor: [],
        backgroundColor: getRandomColor(),
        // label: [],
        // borderColor: "rgba(0,0,0,0)",
        label: 'Preço Unitário do Item',
        // borderWidth: [],
    };
    for (i=0;i<dados.length;i++){
        el=dados[i];
        data['labels'][i]=el.descricao;
        // data['datasets'][0].label[i]=el.descricao;
        data['datasets'][0].data[i]=el.valor;
        // data['datasets'][0].backgroundColor[i]=getRandomColor();
        // data['datasets'][0].borderWidth[i]=1;
    }

    console.log(data);
    var chartItensMaisCaros = document.getElementById("chartItensMaisCaros");
    var dadosItens = new Chart(chartItensMaisCaros, {
        type: 'bar',
        data: data
    });
 }
 function carregarDados(){
    $.ajax({
    url: '{{route('cidadao.api-contratos-total-por-ente')}}',
    success: function (data) {
        // faça o tratamento dos dados e atualize
        // as variáveis dos gráficos.

        dataBar = data;

        geraGraficoTotalContratoPorEnte(dataBar);
    }
    });

    
    carregaDadosItensMaisCaros($('#selectItensMaisCaros').val());
    carregaDadosHistoricoDeAcesso($('#selectHistoricoDeAcesso').val());    

}

function carregaDadosItensMaisCaros(ente_id)
{
    $.ajax({
    url: '{{url('api/contratos/itens/maiscaros')}}/'+ente_id,
    success: function (data) {
        // faça o tratamento dos dados e atualize
        // as variáveis dos gráficos.

        dataBar = data;

        geraGraficoItensMaisCaros(dataBar);
    }
    });
}
function carregaDadosHistoricoDeAcesso(ente_id){
    $.ajax({
    url: '{{url('api/historicos_de_acesso_por_ente')}}/'+ente_id,
    success: function (data) {
        // faça o tratamento dos dados e atualize
        // as variáveis dos gráficos.

        dataBar = data;

        geraGraicoHistoricoDeAcesso(dataBar);
    }
    });
}
$(document).ready(function(){
    carregarDados();

});

 </script>
 
@endsection