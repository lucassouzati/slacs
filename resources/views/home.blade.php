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

                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
