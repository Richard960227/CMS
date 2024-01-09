@extends('layouts.app')

@section('template_title')
    {{ $broadcastMode->name ?? "{{ __('Show') Broadcast Mode" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Broadcast Mode</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('broadcast-modes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-control">
                            <strong>Name:</strong>
                            {{ $broadcastMode->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
