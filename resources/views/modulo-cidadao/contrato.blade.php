@extends('modulo-cidadao.layouts.app')

@section('content')
<section id="intro" class="services-section">
    <div class="container">
        <div class="row">
            

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Contratos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        	<table class="table table-striped">
                        		<caption>Consulta de Contratos</caption>
                        		<thead>
                        			<tr>
                                        <th>Ente Público</th>
                                        <th>Data Emissao</th>
                                        <th>Numero Contrato</th>
                                        <th>Tipo</th>
                                        <th>Fornecedor</th>
                                        <th>Cnpj/Cpf</th>
                                    </tr>
                        		</thead>
                        		<tbody>
                        			@foreach($contratos as $item)
                                    <tr>
                                        <td>{{ $item->ente->nome }}</td>
                                        <td>{{ $item->data_emissao }}</td>
                                        <td>{{ $item->numero_contrato }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->fornecedor }}</td>
                                        <td>{{ $item->cnpj_cpf }}</td>
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
 </section>
@endsection