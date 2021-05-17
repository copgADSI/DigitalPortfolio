@extends('layouts.app')

@section('template_title')
    {{ $proyect->name ?? 'Show Proyect' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proyect</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proyects.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proyectimage:</strong>
                            {{ $proyect->proyectImage }}
                        </div>
                        <div class="form-group">
                            <strong>Proyectname:</strong>
                            {{ $proyect->proyectName }}
                        </div>
                        <div class="form-group">
                            <strong>Proyectdescription:</strong>
                            {{ $proyect->proyectDescription }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $proyect->url }}
                        </div>
                        <div class="form-group">
                            <strong>Tech:</strong>
                            {{ $proyect->tech }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
