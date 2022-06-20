@extends('layouts.app')

@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="p-3 mb-2 bg-primary text-white">{{ $persona }}</div>
        </div>
        <div class="row" align="center">
            <div class="col-sm bg-light">
                <img id='barcode'
                    src="https://api.qrserver.com/v1/create-qr-code/?data={{ $movimientos[0]->token_entrada_->code }}&amp;size=100x100"
                    width="100" height="100" />
                <div>{{ $movimientos[0]->token_entrada_->code }}</div>
                <button type="button" class="btn btn-success"
                    @if (!$movimientos[0]->token_entrada_->valid) disabled @endif>Entrada</button>
            </div>
            <div class="col-sm bg-light">
                <img id='barcode'
                    src="https://api.qrserver.com/v1/create-qr-code/?data={{ $movimientos[0]->token_salida_->code }}&amp;size=100x100"
                    width="100" height="100" />
                <div>{{ $movimientos[0]->token_salida_->code }}</div>
                <button type="button" class="btn btn-success"
                    @if (!$movimientos[0]->token_salida_->valid) disabled @endif>Salida</button>
            </div>
            <div class="col-sm bg-light">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Nuevo movimiento
                    </div>
                    <ul class="list-group list-group-flush " align="left">
                        <form method="POST" action="{{ route('movimiento.for_me') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <li class="list-group-item"><button class="btn btn-success" type="submit">Para mi</button></li>
                        </form>
                        <form method="POST" action="{{ route('movimiento.for_else') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <li class="list-group-item"><button class="btn btn-success" type="submit">Para un invitado</button></li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>No</th>
                            <th>Hora De Entrada</th>
                            <th>Hora De Salida</th>
                            <th>Persona Id</th>
                            <th>Token Entrada</th>
                            <th>Token Salida</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $movimiento)
                            <tr>
                                <td>{{ $movimiento->id }}</td>
                                <td>{{ $movimiento->hora_de_entrada }}</td>
                                <td>{{ $movimiento->hora_de_salida }}</td>
                                <td>{{ $movimiento->persona_id }}</td>
                                <td>{{ $movimiento->token_entrada }}</td>
                                <td>{{ $movimiento->token_salida }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
