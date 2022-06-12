@extends('layouts.app')

@section('template_title')
    {{ $movimiento->name ?? 'Show Movimiento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Movimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('movimientos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Hora De Entrada:</strong>
                            {{ $movimiento->hora_de_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Hora De Salida:</strong>
                            {{ $movimiento->hora_de_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Persona Id:</strong>
                            {{ $movimiento->persona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Token Entrada:</strong>
                            {{ $movimiento->token_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Token Salida:</strong>
                            {{ $movimiento->token_salida }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
