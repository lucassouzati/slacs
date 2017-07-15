@extends('modulo-cidadao.layouts.app')

@section('content')
<section id="intro" class="services-section">
    <div class="container">
        <div class="row">
            

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Licitações</div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    	<table class="table table-striped">
                    		<caption>Consulta de Licitações</caption>
                    		<thead>
                    			<tr>
                                    <th>Unidade Gestora</th>
                                    <th>Num Proc</th>
                                    <th>Modalidade</th>
                                </tr>
                    		</thead>
                    		<tbody>
                    			@foreach($licitacoes as $item)
                                <tr>
                                    <td>{{ $item->unidade_gestora }}</td>
                                    <td>{{ $item->num_proc }}</td>
                                    <td>{{ $item->modalidade }}</td>
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