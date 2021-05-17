<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('techLogo') }}
            {{ Form::text('techLogo', $technology->techLogo, ['class' => 'form-control' . ($errors->has('techLogo') ? ' is-invalid' : ''), 'placeholder' => 'Techlogo']) }}
            {!! $errors->first('techLogo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('techName') }}
            {{ Form::text('techName', $technology->techName, ['class' => 'form-control' . ($errors->has('techName') ? ' is-invalid' : ''), 'placeholder' => 'Techname']) }}
            {!! $errors->first('techName', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>