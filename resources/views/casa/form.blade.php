<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('friendly_id') }}
            {{ Form::text('friendly_id', $casa->friendly_id, ['class' => 'form-control' . ($errors->has('friendly_id') ? ' is-invalid' : ''), 'placeholder' => 'Friendly Id']) }}
            {!! $errors->first('friendly_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('latitude') }}
            {{ Form::text('latitude', $casa->latitude, ['class' => 'form-control' . ($errors->has('latitude') ? ' is-invalid' : ''), 'placeholder' => 'Latitude']) }}
            {!! $errors->first('latitude', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('longitude') }}
            {{ Form::text('longitude', $casa->longitude, ['class' => 'form-control' . ($errors->has('longitude') ? ' is-invalid' : ''), 'placeholder' => 'Longitude']) }}
            {!! $errors->first('longitude', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div>
            <button type="button" onclick="getLocation()">Get current location</button>

            <p id="demo"></p>
            <script>
                var x = document.getElementById("demo");
                function getLocation() {
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                  } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                  }
                }
                
                function showPosition(position) {
                    document.getElementById("latitude").setAttribute('value',position.coords.latitude);
                    document.getElementById("longitude").setAttribute('value',position.coords.longitude);
                }
            </script>
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $casa->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>