        <div class="flex gap-4">
            <div class="flex-1">
                <div class="form-control">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('name', $announcement->name, ['class' => 'input input-bordered' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-control">
                    {{ Form::label('Nombre de Imagen') }}
                    {{ Form::text('image', $announcement->image, ['class' => 'input input-bordered' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de Imagen']) }}
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="flex-none">
                <div class="form-control">
                    {{ Form::label('Inicio') }}
                    {{ Form::text('start', $announcement->start, ['class' => 'input input-bordered' . ($errors->has('start') ? ' is-invalid' : ''), 'placeholder' => 'AAAA-MM-DD']) }}
                    {!! $errors->first('start', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-control">
                    {{ Form::label('Fin') }}
                    {{ Form::text('end', $announcement->end, ['class' => 'input input-bordered' . ($errors->has('end') ? ' is-invalid' : ''), 'placeholder' => 'AAAA-MM-DD']) }}
                    {!! $errors->first('end', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-control">
            {{ Form::label('Enlace de Registro') }}
            {{ Form::text('link', $announcement->link, ['class' => 'input input-bordered' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Enlace de registro']) }}
            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Encabezado') }}
            {{ Form::textarea('header', $announcement->header, ['class' => 'textarea textarea-bordered' . ($errors->has('header') ? ' is-invalid' : ''), 'placeholder' => 'Encabezado']) }}
            {!! $errors->first('header', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Cuerpo') }}
            {{ Form::textarea('body', $announcement->body, ['class' => 'textarea textarea-bordered' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Cuerpo']) }}
            {!! $errors->first('requeriments', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Pie de Página') }}
            {{ Form::textarea('footer', $announcement->footer, ['class' => 'textarea textarea-bordered' . ($errors->has('footer') ? ' is-invalid' : ''), 'placeholder' => 'Pie de Página']) }}
            {!! $errors->first('requeriments', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control mt-6">
            <button type="submit"
                class="btn btn-ghost border-2 border-orange-600 hover:bg-orange-600 hover:text-white">{{ __('Submit') }}</button>
        </div>
