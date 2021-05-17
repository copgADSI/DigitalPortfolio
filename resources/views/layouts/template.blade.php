<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    
    <link rel="icon" {{-- type="image/x-icon" --}} href="assets/img/favicon.ico" /> 
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container"> <a class="navbar-brand js-scroll-trigger" href="#page-top">Digital Portfolio</a> <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"> Menu <i class="fas fa-bars"></i> </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#portfolio">Portfolio</a>  </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#about">Skills</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#contact">Contact</a></li>
                    @if (Auth::check())
                        <li class="nav-item mx-0 mx-lg-1"><a
                                class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('home') }}">Dashboard</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a
                                class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf
                    </form> @else @endif
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center">
        @if (isset($message))
            <div class="alert alert-success" role="alert" id="alert"> <span
                class="$message[0]">{{ $message[1] }}</span> </div>@else @endif <div
                class="container d-flex align-items-center flex-column"> <img
                    class="masthead-avatar mb-5 rounded-circle" src="storage/picture/P_20200120_175408_p_1.jpg"
                    alt="..." />
                <h1 class="masthead-heading text-uppercase mb-0">Digital Portfolio</h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <h6 class="masthead-subheading font-weight-light mb-0">Cristian Parada Gualteros</h6>
                <p class="masthead-subheading font-weight-light mb-0">Web Programmer</p>
                <div class="text-center mt-4">
                    <form action="{{ route('curriculum.downloadCV') }}" method="get" enctype="multipart/form-data">
                        @csrf <button class="btn btn-xl btn-outline-light"> <i class="fas fa-download mr-2"></i>
                            Download CV </button> </form>
                </div>
            </div>
    </header>
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center"> @yield('content') </div>
        </div>
    </section>
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-white">Skills</h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg ml-auto mb-3">
                    <center>
                        <div class="d-flex justify-content-center">
                            <p class="lead">@yield('skills') </p>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section" id="contact">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto"> @yield('contactForm') <form id="contactForm" name="sentMessage"
                        novalidate="novalidate" action="{{ route('send.contactForm') }}" method="POST"> @csrf <div
                            class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2"> <label>Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Name"
                                    required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2"> <label>Email
                                    Address</label> <input class="form-control" id="email" name="email" type="email"
                                    placeholder="Email Address" required="required"
                                    data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2"> <label>Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5"
                                    placeholder="Message" required="required"
                                    data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div><br />
                        <div id="success"></div>
                        <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton"
                                type="submit">Send</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-8">Location</h4>
                    <p class="lead mb-0"> Sogamoso-Boyacá <br /> </p>
                </div>
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-8">Around the Web</h4> <a class="btn btn-outline-light btn-social mx-1"
                        href="https://www.linkedin.com/in/cristian-parada-guateros-3350801a5/" target="_blank"><i
                            class="fab fa-fw fa-linkedin-in"></i></a> <a class="btn btn-outline-light btn-social mx-1"
                        href="https://github.com/copgADSI" target="_blank"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container"> <small> Copyright &copy; Your Website <script>
                    document.write(new Date().getFullYear());

                </script> </small> </div>
    </div>
    <div class="scroll-to-top d-lg-none position-fixed"> <a
            class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
                class="fa fa-chevron-up"></i></a> </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
</body>

</html>
