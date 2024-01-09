@extends('layouts.app')

@section('template_title')
    {{ $interpreter->name ?? "{{ __('Show') Interpreter" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Interpreter</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('interpreters.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-control">
                            <strong>Name:</strong>
                            {{ $interpreter->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
