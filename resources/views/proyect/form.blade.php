<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('proyectImage') }} <br>
            {{ Form::file('proyectImage', $proyect->proyectImage, ['class' => 'form-control' . ($errors->has('proyectImage') ? ' is-invalid' : ''), 'placeholder' => 'Proyectimage']) }}
            {!! $errors->first('proyectImage', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proyectName') }}
            {{ Form::text('proyectName', $proyect->proyectName, ['class' => 'form-control' . ($errors->has('proyectName') ? ' is-invalid' : ''), 'placeholder' => 'Proyectname']) }}
            {!! $errors->first('proyectName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('proyectDescription') }}
        {{ Form::textarea('proyectDescription', $proyect->proyectDescription, ['class' => 'form-control' . ($errors->has('proyectDescription') ? ' is-invalid' : ''), 'placeholder' => 'Proyectdescription']) }}
        {!! $errors->first('proyectDescription', '<div class="invalid-feedback">:message</p>') !!}
        <div class="form-group">
            {{ Form::label('url') }}
            {{ Form::text('url', $proyect->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('gitHubLink') }}
            {{ Form::text('gitHubLink', $proyect->gitHubLink, ['class' => 'form-control' . ($errors->has('gitHubLink') ? ' is-invalid' : ''), 'placeholder' => 'gitHubLink']) }}
            {!! $errors->first('gitHubLink', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    
    <div class="form group">

        <select name="tech[]" id="" class="form-control" multiple="multiple">
            <option value="" disabled>Select Tech</option>
            @foreach ($techlogies as $techlogy)
                <option value="{{ $techlogy->techName }}"> {{ $techlogy->techName }} </option>
            @endforeach
        </select>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
