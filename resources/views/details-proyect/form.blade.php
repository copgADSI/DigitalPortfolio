<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proyect_id') }}
            {{ Form::text('proyect_id', $detailsProyect->proyect_id, ['class' => 'form-control' . ($errors->has('proyect_id') ? ' is-invalid' : ''), 'placeholder' => 'Proyect Id']) }}
            {!! $errors->first('proyect_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('technologie_id') }}
            {{ Form::text('technologie_id', $detailsProyect->technologie_id, ['class' => 'form-control' . ($errors->has('technologie_id') ? ' is-invalid' : ''), 'placeholder' => 'Technologie Id']) }}
            {!! $errors->first('technologie_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>