        <div class="form-control">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $program->name, ['class' => 'input input-bordered' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Frecuencia') }}
            {{ Form::select('frequency[]', $frequencies->pluck('name', 'id'), $program->frequency, ['class' => 'select select-bordered form-multiselect' . ($errors->has('frequency') ? ' is-invalid' : ''), 'multiple' => 'multiple', 'id' => 'frequency-select',
            ]) }}
            {!! $errors->first('frequency', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Categoria') }}
            {{ Form::select('category[]', $categories->pluck('name', 'id'), $program->category, ['class' => 'select select-bordered form-multiselect' . ($errors->has('category') ? ' is-invalid' : ''), 'multiple' => 'multiple', 'id' => 'category-select']) }}
            {!! $errors->first('category', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Productor') }}
            {{ Form::select('user[]', $users->pluck('name', 'id'), $program->user, ['class' => 'select select-bordered form-multiselect' . ($errors->has('user') ? ' is-invalid' : ''), 'multiple' => 'multiple', 'id' => 'user-select']) }}
            {!! $errors->first('user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Sinopsis') }}
            {{ Form::textarea('synopsis', $program->synopsis, ['class' => 'textarea textarea-bordered' . ($errors->has('synopsis') ? ' is-invalid' : ''), 'placeholder' => 'Sinopsis']) }}
            {!! $errors->first('synopsis', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Imagen') }}
            {{ Form::text('image', $program->image, ['class' => 'input input-bordered' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Banner') }}
            {{ Form::text('banner', $program->banner, ['class' => 'input input-bordered' . ($errors->has('banner') ? ' is-invalid' : ''), 'placeholder' => 'Banner']) }}
            {!! $errors->first('banner', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control mt-6">
            <button type="submit"
                class="btn btn-ghost border-2 border-orange-600 hover:bg-orange-600 hover:text-white">
                {{ __('Submit') }}
            </button>
        </div>
