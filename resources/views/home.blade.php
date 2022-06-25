@extends('layouts.app')

@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


    <div class="container">
        <div class="row">
            <div class="p-3 mb-2 bg-primary text-white"></div>
        </div>
        <div class="row m-3">
            <div class="col-sm bg-light">
                <div class="align-middle">
                    <strong>No:</strong>
                    {{ $movimientos->first()->id }}
                </div>
                <div class="align-middle">
                    <strong>Nombre:</strong>
                    {{ $movimientos->first()->persona->name }}
                </div>
                <div class="align-middle">
                    <strong>Celular:</strong>
                    {{ $movimientos->first()->persona->phone }}
                </div>
                <div class="align-middle">
                    <strong>Entrada:</strong>
                    {{ $movimientos->first()->token_entrada_->code }}
                </div>
                <div class="align-middle">
                    <strong>Salida:</strong>
                    {{ $movimientos->first()->token_salida_->code }}
                </div>
            </div>
            <div class="col-sm bg-light align-middle">

                <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data={{ $movimientos->first()->token_entrada_->code }}&amp;size=100x100" width="100" height="100" />

                <form method="POST" action="{{ route('movimiento.use_token') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="movimiento_id" value={{ $movimientos->first()->id }} />
                    <input type="hidden" name="token_id" value={{ $movimientos->first()->token_entrada }} />
                    <button type="submit" class="btn btn-success" @if (!$movimientos->first()->token_entrada_->valid) disabled @endif>Entrada</button>
                </form>
            </div>

            <div class="col-sm bg-light align-middle">

                <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data={{ $movimientos->first()->token_salida_->code }}&amp;size=100x100" width="100" height="100" />

                <form method="POST" action="{{ route('movimiento.use_token') }}" role="form" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="movimiento_id" value={{ $movimientos->first()->id }} />
                    <input type="hidden" name="token_id" value={{ $movimientos->first()->token_salida }} />
                    <button type="submit" class="btn btn-success" @if (!$movimientos->first()->token_salida_->valid) disabled @endif>Salida</button>

                </form>

            </div>
            <div class="col-sm bg-light">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Nuevo movimiento
                    </div>
                    <ul class="list-group list-group-flush " align="left">
                        <form method="POST" action="{{ route('movimiento.for_me') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <li class="list-group-item">
                                <button class="btn btn-success" type="submit">Para mi</button>
                            </li>
                        </form>



                        <li class="list-group-item">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#invitadosModal">
                                Para un invitado
                            </button>
                        </li>

                        <div id="popover_content_wrapper" style="display: none">
                            <p>
                                Do you want to close this message?
                            </p>
                            <div class="row">
                                <div class="col-md-2" id="confirm">
                                    <i class="far fa-check-circle fa-2x green-text"></i>
                                </div>
                                <div class="col-md-2" id="deny">
                                    <i class="far fa-times-circle fa-2x red-text"></i>
                                </div>
                            </div>
                        </div>
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
                            <th>Persona</th>
                            <th>Esta dentro</th>
                            <th>Comportamiento</th>
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
                                <td>{{ $movimiento->persona->name }}</td>
                                <td>
                                    @if ($movimiento->inside == 1)
                                        ✅
                                    @else
                                        @if ($movimiento->inside == 2)
                                            ❌
                                        @else
                                            ❔
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $movimiento->behaviour }}</td>
                                <td>{{ $movimiento->token_entrada_->code }}</td>
                                <td>{{ $movimiento->token_salida_->code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <!-- Modal para seleccionar invitados -->
        <div class="modal fade" id="invitadosModal" tabindex="-1" aria-labelledby="invitadosModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="invitadosModalLabel">Agregar Invitado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('movimiento.for_else') }}" role="form"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                @csrf
                                {{ Form::label('invitado_id') }}
                                <select name="invitado_id" class="form-control">
                                    <option></option>
                                    <!--selected by default-->
                                    @foreach ($invitados as $invitado)
                                        <option value="{{ $invitado->id }}">
                                            {{ $invitado->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_invitadoModal">
                                    Agregar Invitado
                                </a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Generar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- Modal para crear invitado -->
        <div class="modal fade" id="add_invitadoModal" tabindex="-1" aria-labelledby="add_invitadoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_invitadoModalLabel">Agregar Invitado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('movimiento.create_invitado') }}" role="form"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                {{ Form::label('name') }}
                                {{ Form::text('name', $invitado->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('phone') }}
                                {{ Form::text('phone', $invitado->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
                                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Generar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
