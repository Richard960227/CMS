        <div class="form-control">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $audioLibrary->name, ['class' => 'input input-bordered' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Programa') }}
            {{ Form::select('program_id', $program->pluck('name', 'id'), $audioLibrary->program, ['class' => 'select select-bordered' . ($errors->has('program') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un programa']) }}
            {!! $errors->first('program', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Invitados') }}
            {{ Form::textarea('guests', $audioLibrary->guests, ['class' => 'textarea textarea-bordered' . ($errors->has('guests') ? ' is-invalid' : ''), 'placeholder' => 'Invitados']) }}
            {!! $errors->first('guests', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Sinopsis') }}
            {{ Form::textarea('synopsis', $audioLibrary->synopsis, ['class' => 'textarea textarea-bordered' . ($errors->has('synopsis') ? ' is-invalid' : ''), 'placeholder' => 'Sinopsis']) }}
            {!! $errors->first('synopsis', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Media') }}
            {{ Form::text('media', $audioLibrary->media, ['class' => 'input input-bordered' . ($errors->has('media') ? ' is-invalid' : ''), 'placeholder' => 'Media']) }}
            {!! $errors->first('media', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control mt-6">
            <button type="submit" class="btn btn-ghost border-2 border-orange-600 hover:bg-orange-600 hover:text-white">
                {{ __('Submit') }}
            </button>
        </div>
