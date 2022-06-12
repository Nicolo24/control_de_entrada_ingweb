<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $persona->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $persona->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('casa_id') }}
            <select name="casa_id" class="form-control">
                <option></option><!--selected by default-->
                @foreach($casas as $casa)
                    <option value="{{ $casa->id }}" @if ($casa->id == $persona->casa_id) selected @endif>
                        {{ $casa->friendly_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('role') }}
            <select name="role" class="form-control">
                <option></option><!--selected by default-->
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if ($role->id == $persona->role) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>