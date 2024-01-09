    <div class="form-control">
        {{ Form::label('Nombre') }}
        {{ Form::text('name', $station->name, ['class' => 'input input-bordered' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('name', '<div class="text-red-600">:message</div>') !!}
    </div>
    <div class="form-control">
        {{ Form::label('Frecuencia') }}
        {{ Form::text('frequency', $station->frequency, ['class' => 'input input-bordered' . ($errors->has('frequency') ? ' is-invalid' : ''), 'placeholder' => 'Frecuencia']) }}
        {!! $errors->first('frequency', '<div class="text-red-600">:message</div>') !!}
    </div>
    <div class="form-control">
        {{ Form::label('Enlace de Frecuencia') }}
        {{ Form::text('frequency_link', $station->frequency_link, ['class' => 'input input-bordered' . ($errors->has('frequency_link') ? ' is-invalid' : ''), 'placeholder' => 'Enlace de Frecuencia']) }}
        {!! $errors->first('frequency_link', '<div class="text-red-600">:message</div>') !!}
    </div>
    <div class="form-control">
        {{ Form::label('Imagen') }}
        {{ Form::text('image', $station->image, ['class' => 'input input-bordered' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
        {!! $errors->first('image', '<div class="text-red-600">:message</div>') !!}
    </div>
    <div class="form-control mt-6">
        <button type="submit" class="btn btn-ghost border-2 border-orange-600 hover:bg-orange-600 hover:text-white">
            {{ __('Submit') }}
        </button>
    </div>