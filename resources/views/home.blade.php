@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dados no Site</div>

                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-text">Licitações</span>
                                  <span class="info-box-number">{{$dados['qtd_licitacoes']}}</span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>    
                      </div>
                      <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-calendar-check-o"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Contratos</span>
                              <span class="info-box-number">{{$dados['qtd_contratos']}}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>    
                        </div>
                      <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text">Contestações</span>
                              <span class="info-box-number">0</span>
                          </div>
                          <!-- /.info-box-content -->
                      </div>    
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Contestações</div>
                <div class="col-md-12">
                    <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Data</th>
                                        <th>Status</th>
                                        <th>Ente Contestado</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contestacoes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->data }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->tipo == 'contrato' ? $item->contrato->ente->nome : $item->licitacao->ente->nome}}</td>
                                        <td>
                                        @if($item->status == 'Pendente')
                                            <a href="{{ route('contestacao.responder', $item->id) }}" title="Responder Contestação"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Responder</button></a>
                                            
                                        @endif
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/contestacao', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Excluir Contestacao',
                                                        'onclick'=>'return confirm("Confirma exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $contestacoes->render() !!} </div>
                        </div>
                        </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
