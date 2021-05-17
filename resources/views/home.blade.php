@extends('layouts.app')<style>
    .file-select {
        position: relative;
        display: inline-block;
    }

    .file-select::before {
        background-color: #5678EF;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
        content: 'Seleccionar';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    .file-select input[type="file"] {
        opacity: 0;
        width: 500px;
        height: 50px;
        display: inline-block;
    }

    #src-file1::before {
        content: 'Seleccionar Archivo 1';
    }

    #curriculum::before {
        content: 'Upload CV';
    }

    #picture::before {
        content: 'Upload Picture';
    }

</style>@section('content') <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                            @endif <a href="{{ route('proyects.index') }}" class="btn btn-secondary m-5">Proyects</a> <a
                                href="{{ route('technologies.index') }}" class="btn btn-secondary m-5">Technologies</a> <a
                                href="{{ url('/') }}" class="btn btn-secondary m-5">Portfolio</a>
                            <div class="justify-content-center">
                                @foreach ($user as $data) <label
                                        for="curriculum">{{ $data->curriculum }}</label> @endforeach
                                <form action="{{ route('curriculum.uploadCV') }}" method="POST" role="form"
                                    enctype="multipart/form-data"> @csrf <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="file-select" id="curriculum"> <input type="file" name="curriculum" id=""
                                                accept="image/pdf"> </div>
                                        <div class="d-flex justify-content-between"> <button type="submit"
                                                class="btn btn-success">Update CV</button> <button type="submit"
                                                class="btn btn-primary">Show CV</button> <button type="submit"
                                                class="btn btn-secondary">Delete CV</button> @error('curriculum') <small
                                                class="text-danger">{{ $message }}</small> @enderror </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>@endsection
