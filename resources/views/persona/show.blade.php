@extends('layouts.app')

@section('template_title')
    {{ $persona->name ?? 'Show Persona' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $persona->name }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            <a href="http://wa.me/{{ $persona->phone }}" target="_blank">{{ $persona->phone }}</a>
                        </div>
                        <div class="form-group">
                            <strong>Casa:</strong>
                            @if ($persona->casa != null)
                                {{ $persona->casa->friendly_id }}
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Role:</strong>
                            {{ $persona->role_->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
