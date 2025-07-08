<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="icon" sizes="16x16" href="{{ asset("favicon.ico") }}"/>
    <meta property="og:image" content="{{ asset("dc_logo_750_750.png") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("dc_logo_750_750.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("favicon.ico") }}">
@hasSection('meta')
    @yield('meta')
@else
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="keywords" content="Artificial Intelligence, AI, Innovative, 2025, IT, Tech, Blogs, news, tutorials, software development, IT infrastructure, technical communication, startup, co-founders, developers, learning, education, coding, programming, web development, web design, Duck Cloud">
    <meta name="description" content="At Duck Cloud, we're passionate about making tech knowledge accessible for everyone—from solo developers and startup teams to co-founders and lifelong learners. Our platform is built to empower you with practical tutorials, clear documentation, and reliable references in all areas of software development, IT infrastructure, and technical communication.  Whether you’re just starting out or scaling a product, Duck Cloud is your go-to resource to learn, build, and grow with confidence. We simplify complex topics, support real-world use cases, and keep pace with the rapidly evolving tech landscape.">
    <meta property="og:title" content="Duck Cloud - Learning Platform for IT, Tech, and Software Development">
    <meta property="og:description" content="At Duck Cloud, we're passionate about making tech knowledge accessible for everyone—from solo developers and startup teams to co-founders and lifelong learners. Our platform is built to empower you with practical tutorials, clear documentation, and reliable references in all areas of software development, IT infrastructure, and technical communication.  Whether you’re just starting out or scaling a product, Duck Cloud is your go-to resource to learn, build, and grow with confidence. We simplify complex topics, support real-world use cases, and keep pace with the rapidly evolving tech landscape.">
    <meta property="og:image" content="{{ asset("dc_logo_750_750.png") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("dc_logo_750_750.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("favicon.ico") }}">
    <link rel="manifest" href="{{ asset("site.webmanifest") }}">
    <link rel="mask-icon" href="{{ asset("safari-pinned-tab.svg") }}" color="#5bbad5">
@endif    
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset("assets/frontend/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/frontend/css/owl.carousel.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/frontend/css/line-awesome.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/frontend/css/fontawesome.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/frontend/css/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/frontend/css/custom.css") }}"/>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WTH86DLL');</script>
    <!-- End Google Tag Manager -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3157572406863018"
     crossorigin="anonymous"></script>
</head>
<body>
    <div class="loader">
        <div class="loader-element"></div>
    </div>
    <x-frontend.header/>
    @yield("content")
    <br>
    @if(isset($realtimeUsers))
    <div class="container-fluid realtime-analytics-section">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                        <h5 class="mb-1">👀 Real-Time Visitors</h5>
                        <h2 class="mb-0 text-primary">{{ $realtimeUsers }}</h2>
                        <small class="text-muted">Users on site right now</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                        <h6 class="mb-1">Top Countries</h6>
                        <ul class="list-unstyled mb-0">
                            @foreach($topCountries ?? [] as $country)
                                <li>
                                    {{ $country['country'] }} <span class="badge bg-light text-dark">{{ $country['activeUsers'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br>
    <x-frontend.footer/>
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>
    <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 m-auto">
                    <div class="search-width">
                        <button type="button" class="close">
                            <i class="far fa-times"></i>
                        </button>
                        <form class="search-form" action="{{ route("frontend.search") }}">
                            <input type="search" name="q" value="{{ request()->route()->getName() == "frontend.search" ? request()->q : "" }}" placeholder="What are you looking for?">
                            <button type="submit" class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset("assets/frontend/js/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/frontend/js/popper.min.js") }}"></script>
    <script src="{{ asset("assets/frontend/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/frontend/js/theia-sticky-sidebar.js") }}"></script>
    <script src="{{ asset("assets/frontend/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/frontend/js/switch.js") }}"></script>
    <script src="{{ asset("assets/frontend/js/jquery.marquee.js") }}"></script>
    <script src="{{ asset("assets/frontend/js/main.js") }}"></script>
    @yield("script")
</body>
</html>
