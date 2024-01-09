        <div class="form-control">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $category->name, ['class' => 'input input-bordered' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control mt-6">
            <button type="submit"
                class="btn btn-ghost border-2 border-orange-600 hover:bg-orange-600 hover:text-white">{{ __('Submit') }}</button>
        </div>
