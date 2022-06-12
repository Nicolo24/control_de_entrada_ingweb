<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('hora_de_entrada') }}
            {{ Form::text('hora_de_entrada', $movimiento->hora_de_entrada, ['class' => 'form-control' . ($errors->has('hora_de_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Hora De Entrada']) }}
            {!! $errors->first('hora_de_entrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_de_salida') }}
            {{ Form::text('hora_de_salida', $movimiento->hora_de_salida, ['class' => 'form-control' . ($errors->has('hora_de_salida') ? ' is-invalid' : ''), 'placeholder' => 'Hora De Salida']) }}
            {!! $errors->first('hora_de_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('persona_id') }}
            {{ Form::text('persona_id', $movimiento->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Persona Id']) }}
            {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('token_entrada') }}
            {{ Form::text('token_entrada', $movimiento->token_entrada, ['class' => 'form-control' . ($errors->has('token_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Token Entrada']) }}
            {!! $errors->first('token_entrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('token_salida') }}
            {{ Form::text('token_salida', $movimiento->token_salida, ['class' => 'form-control' . ($errors->has('token_salida') ? ' is-invalid' : ''), 'placeholder' => 'Token Salida']) }}
            {!! $errors->first('token_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>