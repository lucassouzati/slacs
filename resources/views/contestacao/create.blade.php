@extends('modulo-cidadao.layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @if($tipo == 'contrato')
                    <div class="panel-heading">Contestar Contrato {{$contrato->id}}</div>
                    @else
                    <div class="panel-heading">Contestar Licitação {{$licitacao->id}}</div>
                    @endif
                    <div class="panel-body">
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if($tipo == 'contrato')
                        {!! Form::open(['url' => route('contestacao.store', ['tipo' => $tipo, 'id' => $contrato->id]), 'class' => 'form-horizontal', 'files' => true]) !!}
                        @else
                        {!! Form::open(['url' => route('contestacao.store', ['tipo' => $tipo, 'id' => $licitacao->id]), 'class' => 'form-horizontal', 'files' => true]) !!}
                        @endif

                        @include ('contestacao.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
