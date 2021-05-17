@extends('layouts.app')

@section('template_title')
    {{ $detailsProyect->name ?? 'Show Details Proyect' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Details Proyect</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('details-proyects.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proyect Id:</strong>
                            {{ $detailsProyect->proyect_id }}
                        </div>
                        <div class="form-group">
                            <strong>Technologie Id:</strong>
                            {{ $detailsProyect->technologie_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
