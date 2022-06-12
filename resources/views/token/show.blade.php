@extends('layouts.app')

@section('template_title')
    {{ $token->name ?? 'Show Token' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Token</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tokens.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $token->code }}
                        </div>
                        <div class="form-group">
                            <strong>Valid:</strong>
                            {{ $token->valid }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
