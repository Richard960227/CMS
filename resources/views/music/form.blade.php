        <div class="form-control">
            {{ Form::label('Canción') }}
            {{ Form::text('name', $music->name, ['class' => 'input input-bordered' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Canción']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Interprete') }}
            {{ Form::select('interpreter[]', $interpreters->pluck('name', 'id'), $music->interpreter, ['class' => 'select select-bordered form-multiselect' . ($errors->has('interpreter') ? ' is-invalid' : ''), 'multiple' => 'multiple', 'id' => 'interpreter-select']) }}
            {!! $errors->first('interpreter', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Género') }}
            {{ Form::select('musicalGenre[]', $musicalgenres->pluck('name', 'id'), $music->genre, ['class' => 'select select-bordered form-multiselect' . ($errors->has('genre') ? ' is-invalid' : ''), 'multiple' => 'multiple', 'id' => 'genre-select']) }}
            {!! $errors->first('genre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Año') }}
            {{ Form::text('year', $music->year, ['class' => 'input input-bordered' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Año']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Imagen') }}
            {{ Form::text('image', $music->image, ['class' => 'input input-bordered' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Media') }}
            {{ Form::text('media', $music->media, ['class' => 'input input-bordered' . ($errors->has('media') ? ' is-invalid' : ''), 'placeholder' => 'Media']) }}
            {!! $errors->first('media', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control mt-6">
            <button type="submit"
                class="btn btn-ghost border-2 border-orange-600 hover:bg-orange-600 hover:text-white">{{ __('Submit') }}</button>
        </div>
