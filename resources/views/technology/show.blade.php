@extends('layouts.app')

@section('template_title')
    {{ $technology->name ?? 'Show Technology' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Technology</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('technologies.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Techlogo:</strong>
                            {{ $technology->techLogo }}
                        </div>
                        <div class="form-group">
                            <strong>Techname:</strong>
                            {{ $technology->techName }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
