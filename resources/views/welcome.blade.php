@extends('layouts.template')
@section('title', 'Welcome to my digital portfolio')
@section('content')
    
    @foreach ($proyects as $proyect)
        <tr>

            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#proyect{{ $proyect->id }}">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i>
                        </div>
                    </div>

                    <img class="img-fluid" src="{{ asset($proyect->proyectImage) }}" alt="">
                </div>
            </div>
            <!-- Portfolio Modals-->
            <!-- Portfolio Modal 1-->
            <div class="portfolio-modal modal fade" id="proyect{{ $proyect->id }}" tabindex="-1" role="dialog"
                aria-labelledby="portfolioModal1Label" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                        <div class="modal-body text-center">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">

                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"
                                            id="portfolioModal1Label"> {{ $proyect->proyectName }} </h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Portfolio Modal - Image-->

                                        <img class="img-fluid rounded mb-5" src="{{ asset($proyect->proyectImage) }}"
                                            alt="..." />
                                        <!-- Portfolio Modal - Text-->
                                        <p class="mb-5">
                                            {{ $proyect->proyectDescription }}.


                                        </p>
                                        <p class="mb-3">

                                            <b>Technologies:</b>
                                            <br>- {{ $proyect->tech }}
                                        </p>
                                        <a href="{{ $proyect->url }}" class="btn btn-primary">Go To Demo</a>

                                        <a href="{{ $proyect->gitHubLink }}" class="btn btn-primary">Go To GitHub </a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </tr>

    @endforeach

@endsection
@section('skills')
    @foreach ($technologies as $technology)

        <br>- {{ $technology->techName }} <i class="{{ $technology->techLogo }}"></i>

    @endforeach
@endsection

@section('contactForm')

@endsection
