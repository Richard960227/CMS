        <div class="form-control">
            {{ Form::label('Programa') }}
            {{ Form::select('program_id', $program->pluck('name', 'id'), $broadcast->program, ['class' => 'select select-bordered' . ($errors->has('program') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un programa']) }}
            {!! $errors->first('program', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Modo de emisión') }}
            {{ Form::select('broadcast_mode_id', $broadcastmode->pluck('name', 'id'), $broadcast->broadcastmode, ['class' => 'select select-bordered' . ($errors->has('broadcastmode') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un modo de emisión']) }}
            {!! $errors->first('broadcastmode', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-control">
            {{ Form::label('Inicio') }}
            {{ Form::text('start', $broadcast->start, ['class' => 'input input-bordered datetimepicker' . ($errors->has('start') ? ' is-invalid' : ''), 'placeholder' => 'Inicio']) }}
            {!! $errors->first('start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-control">
            {{ Form::label('Fin') }}
            {{ Form::text('end', $broadcast->end, ['class' => 'input input-bordered datetimepicker' . ($errors->has('end') ? ' is-invalid' : ''), 'placeholder' => 'Fin']) }}
            {!! $errors->first('end', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-control mt-6">
            <button type="submit"
                class="btn btn-ghost border-2 border-orange-600 hover:bg-orange-600 hover:text-white">{{ __('Submit') }}</button>
        </div>
