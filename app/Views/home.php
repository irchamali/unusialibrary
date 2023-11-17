<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Elixir | Beautiful Site Template for Agencies &amp; Professionals</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/frontend') ?>/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public/frontend') ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/frontend') ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('public/frontend') ?>/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url('public/frontend') ?>/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= base_url('public/frontend') ?>/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= base_url('public/frontend') ?>/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url('public/frontend') ?>/vendors/hamburgers/hamburgers.min.css" rel="stylesheet">
    <link href="<?= base_url('public/frontend') ?>/vendors/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="<?= base_url('public/frontend') ?>/assets/css/theme.css" rel="stylesheet" />
    <link href="<?= base_url('public/frontend') ?>/assets/css/user.css" rel="stylesheet" />

    <link rel="preconnect" href="<?= base_url('public/frontend') ?>/https://fonts.googleapis.com">
    <link rel="preconnect" href="<?= base_url('public/frontend') ?>/https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
</head>


<body>
    <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
        <div class="container">
            <div class="row align-items-center gx-4">
                <div class="col-auto d-none d-lg-block fs--1"><span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span>1010 Avenue, New York, NY 10018 US. </div>
                <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center"><span class="fas fa-clock text-warning me-2" data-fa-transform="grow-3"></span>Mon-Sat, 8.00-18.00. Sunday CLOSED</div>
                <div class="col-auto"><span class="fas fa-phone-alt text-warning" data-fa-transform="shrink-3"></span><a class="ms-2 fs--1 d-inline text-white fw-bold" href="<?= base_url('public/frontend') ?>/tel:2123865575">212 386 5575, 212 386 5576</a></div>
            </div>
        </div>
    </div>
    <div class="sticky-top navbar-elixir">
        <div class="container">
            <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="<?= base_url('public/frontend') ?>/index.html"><img src="<?= base_url('public/frontend') ?>/assets/img/logo-dark.png" alt="logo" /></a>
                <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
                <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
                    <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="<?= base_url('public/frontend') ?>/JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/index.html">Slider Header</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/homes/header-slider-classic.html">Slider Classic</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/homes/header-static.html">Static Header</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/homes/header-static-classic.html">Static Classic</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/homes/header-youtube-video.html">Youtube Background</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/homes/header-youtube-video-classic.html">Youtube Classic</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/homes/header-selfhosted-video.html">Self-hosted Video</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/homes/header-selfhosted-video-classic.html">Self-hosted Classic</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="<?= base_url('public/frontend') ?>/JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/pages/service.html">Services</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/pages/about.html">About</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/pages/alumni.html">Alumni</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/pages/blank.html">Blank Page</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/pages/404.html">404 Page</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/pages/login.html">Login</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/pages/registration.html">Registration</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="<?= base_url('public/frontend') ?>/JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/news/newsroom.html">Newsroom</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/news/news.html">Single News</a></li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="<?= base_url('public/frontend') ?>/JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/news/newsroom.html">Newsroom</a></li>
                                        <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/news/newsroom.html">Newsroom</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="<?= base_url('public/frontend') ?>/JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Elements</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/buttons.html">Buttons</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/colors.html">Colors</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/googlemap.html">Google Map</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/grid.html">Grid</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/icons.html">Icons</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/layouthelpers.html">Layout Helpers</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/modal-video.html">Modal Video</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/swiper.html">Swiper</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('public/frontend') ?>/elements/typography.html">Typography</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link" href="<?= base_url('public/frontend') ?>/contact.html" role="button">Contact</a>
                        </li>
                    </ul><a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0" href="<?= base_url('public/frontend') ?>/https://themewagon.com/themes/elixir/" target="_blank">Purchase</a>
                </div>
            </nav>
        </div>
    </div>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="preloader" id="preloader">
            <div class="loader">
                <div class="line-scale">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <section class="py-0">
            <div class="swiper theme-slider min-vh-100" data-swiper='{"loop":true,"allowTouchMove":false,"autoplay":{"delay":5000},"effect":"fade","speed":800}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-zanim-timeline="{}">
                        <div class="bg-holder" style="background-image:url(public/frontend/assets/img/header-6.jpg);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="container">
                            <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                                <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                                    <div class="overflow-hidden">
                                        <h1 class="fs-4 fs-md-5 lh-1" data-zanim-xs='{"delay":0}'>Helping Leaders</h1>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs" data-zanim-xs='{"delay":0.1}'>We look forward to help you in taking your company to new height.</p>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div data-zanim-xs='{"delay":0.2}'><a class="btn btn-primary me-3 mt-3" href="<?= base_url('public/frontend') ?>/#!">Read more<span class="fas fa-chevron-right ms-2"></span></a><a class="btn btn-warning mt-3" href="<?= base_url('public/frontend') ?>/contact.html">Contact us<span class="fas fa-chevron-right ms-2"></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-zanim-timeline="{}">
                        <div class="bg-holder" style="background-image:url(public/frontend/assets/img/header-5.jpg);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="container">
                            <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                                <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                                    <div class="overflow-hidden">
                                        <h1 class="fs-4 fs-md-5 lh-1" data-zanim-xs='{"delay":0}'>Expert Consultants</h1>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs" data-zanim-xs='{"delay":0.1}'>Over 10 years of experience in helping clients finding comprehensive solutions.</p>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div data-zanim-xs='{"delay":0.2}'><a class="btn btn-primary me-3 mt-3" href="<?= base_url('public/frontend') ?>/#!">Read more<span class="fas fa-chevron-right ms-2"></span></a><a class="btn btn-warning mt-3" href="<?= base_url('public/frontend') ?>/contact.html">Contact us<span class="fas fa-chevron-right ms-2"></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-zanim-timeline="{}">
                        <div class="bg-holder" style="background-image:url(public/frontend/assets/img/header-1.jpg);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="container">
                            <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                                <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                                    <div class="overflow-hidden">
                                        <h1 class="fs-4 fs-md-5 lh-1" data-zanim-xs='{"delay":0}'>Growth Partners</h1>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs" data-zanim-xs='{"delay":0.1}'>Connect with top consultants hand-picked by Elixir consulting and finance.</p>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div data-zanim-xs='{"delay":0.2}'><a class="btn btn-primary me-3 mt-3" href="<?= base_url('public/frontend') ?>/#!">Read more<span class="fas fa-chevron-right ms-2"></span></a><a class="btn btn-warning mt-3" href="<?= base_url('public/frontend') ?>/contact.html">Contact us<span class="fas fa-chevron-right ms-2"></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-nav">
                    <div class="swiper-button-prev"><span class="fas fa-chevron-left"></span></div>
                    <div class="swiper-button-next"><span class="fas fa-chevron-right"></span></div>
                </div>
            </div>
        </section>

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-100">

            <div class="container">
                <div class="row align-items-stretch justify-content-center mb-4">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-body px-5">
                                <h5 class="mb-3">Jam Operasional Layanan</h5>
                                <p class="mb-0 text-1100">
                                    Senin-Jumat 08.00 - 16.00 WIB <br>
                                    Sabtu-Minggu 09.00 - 15.30 WIB <br>
                                    Cuti Bersama dan Libur Nasional Tutup <br>
                                    Maksimal pengunjung 2000 Perhari
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-body px-5">
                                <h5 class="mb-3">Sydney Office</h5>
                                <p class="mb-0 text-1100">
                                    62 Collins Street West,<br>Sydney 3000, <br>Australia</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-body px-5">
                                <h5>Socials</h5><a class="d-inline-block mt-2" href="#!"><svg class="svg-inline--fa fa-linkedin fa-w-14 fs-2 me-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                    </svg><!-- <span class="fab fa-linkedin fs-2 me-2 text-primary"></span> Font Awesome fontawesome.com --></a><a class="d-inline-block mt-2" href="#!"><svg class="svg-inline--fa fa-twitter-square fa-w-14 fs-2 mx-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path>
                                    </svg><!-- <span class="fab fa-twitter-square fs-2 mx-2 text-primary"></span> Font Awesome fontawesome.com --></a><a class="d-inline-block mt-2" href="#!"><svg class="svg-inline--fa fa-facebook-square fa-w-14 fs-2 mx-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path>
                                    </svg><!-- <span class="fab fa-facebook-square fs-2 mx-2 text-primary"></span> Font Awesome fontawesome.com --></a><a class="d-inline-block mt-2" href="#!"><svg class="svg-inline--fa fa-google-plus-square fa-w-14 fs-2 ms-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-plus-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM164 356c-55.3 0-100-44.7-100-100s44.7-100 100-100c27 0 49.5 9.8 67 26.2l-27.1 26.1c-7.4-7.1-20.3-15.4-39.8-15.4-34.1 0-61.9 28.2-61.9 63.2 0 34.9 27.8 63.2 61.9 63.2 39.6 0 54.4-28.5 56.8-43.1H164v-34.4h94.4c1 5 1.6 10.1 1.6 16.6 0 57.1-38.3 97.6-96 97.6zm220-81.8h-29v29h-29.2v-29h-29V245h29v-29H355v29h29v29.2z"></path>
                                    </svg><!-- <span class="fab fa-google-plus-square fs-2 ms-2 text-primary"></span> Font Awesome fontawesome.com --></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-white">

            <div class="container">
                <div class="text-center mb-6">
                    <h3 class="fs-2 fs-md-3">Buku Populer</h3>
                    <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                </div>
                <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":1,"autoplay":{"delay":5000}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row px-lg-8">
                                <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/client1.png" alt="Member" /></div>
                                <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                                    <p class="lead">Their work on our website and Internet marketing has made a significant different to our business. We’ve seen a 425% increase in quote requests from the website which has been pretty remarkable – but I’d always like to see more!</p>
                                    <h6 class="fs-0 mb-1 mt-4">Michael Clarke</h6>
                                    <p class="mb-0 text-500">CEO, A.E.T Institute</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row px-lg-8">
                                <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/client2.png" alt="Member" /></div>
                                <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                                    <p class="lead">Writing case studies was a daunting task for us. We didn’t know where to begin or what questions to ask, and clients never seemed to follow through when we asked. Elixir team did everything – with almost no time or effort for me!</p>
                                    <h6 class="fs-0 mb-1 mt-4">Maria Sharapova</h6>
                                    <p class="mb-0 text-500">Managing Director, Themewagon Inc.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row px-lg-8">
                                <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/client3.png" alt="Member" /></div>
                                <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                                    <p class="lead">As a sales gamification company, we were skeptical to work with a consultant to optimize our sales emails, but Elixir was highly recommended by many other Y-Combinator startups we knew. Elixir helped us run a ~6 week email campaign.</p>
                                    <h6 class="fs-0 mb-1 mt-4">David Beckham</h6>
                                    <p class="mb-0 text-500">Chairman, Harmony Corporation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-prev icon-item icon-item-lg"><span class="fas fa-chevron-left fs--2"></span></div>
                        <div class="swiper-button-next icon-item icon-item-lg"><span class="fas fa-chevron-right fs--2"></span></div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <!-- <section class="bg-white text-center">

            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-10 col-md-6">
                        <h3 class="fs-2 fs-lg-3">Welcome to the Elixir</h3>
                        <p class="px-lg-4 mt-3">Get expert consultancy and support with Elixir, an advisory firm that stand by your side always.</p>
                        <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                    </div>
                </div>
                <div class="row mt-4 mt-md-5">
                    <div class="col-sm-6 col-lg-3 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="ring-icon mx-auto" data-zanim-xs='{"delay":0}'><span class="far fa-chart-bar"></span></div>
                        <h5 class="mt-4" data-zanim-xs='{"delay":0.1}'>Business Consulting</h5>
                        <p class="mb-0 mt-3 px-3" data-zanim-xs='{"delay":0.2}'>Solution for every business related problems, readily <br /> and skillfully.</p>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="ring-icon mx-auto" data-zanim-xs='{"delay":0}'><span class="far fa-bell"></span></div>
                        <h5 class="mt-4" data-zanim-xs='{"delay":0.1}'>Risk Management</h5>
                        <p class="mb-0 mt-3 px-3" data-zanim-xs='{"delay":0.2}'>Calculate every possible risk in your business, take <br /> control over them.</p>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="ring-icon mx-auto" data-zanim-xs='{"delay":0}'><span class="far fa-lightbulb"></span></div>
                        <h5 class="mt-4" data-zanim-xs='{"delay":0.1}'>Market Research</h5>
                        <p class="mb-0 mt-3 px-3" data-zanim-xs='{"delay":0.2}'>Know the market before taking any step, reduce <br /> risks before you go.</p>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="ring-icon mx-auto" data-zanim-xs='{"delay":0}'><span class="fas fa-headset"></span></div>
                        <h5 class="mt-4" data-zanim-xs='{"delay":0.1}'>Quality Services</h5>
                        <p class="mb-0 mt-3 px-3" data-zanim-xs='{"delay":0.2}'>Experience unparalleled service, from beginning <br /> to final construction.</p>
                    </div>
                </div>
            </div>

        </section> -->
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <!-- <section class="pt-0">

            <div class="container">
                <div class="row flex-center text-center pb-6">
                    <div class="col-12">
                        <div class="position-relative mt-4 py-5 py-md-11">
                            <div class="bg-holder rounded-3" style="background-image:url(public/frontend/assets/img/video-screenshot-2.jpg);">
                            </div>

                            <button class="btn-elixir-play" data-bigpicture="{&quot;ytSrc&quot;:&quot;jlWMTNZNOc0&quot;}" data-zanim-trigger="scroll" data-zanim-xs='{"from":{"opacity":0,"scale":0.8},"to":{"opacity":1,"scale":1},"duration":1}'><span class="fas fa-play fs-1"></span></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4 mt-3 mt-lg-0 px-4 px-sm-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <h5 data-zanim-xs='{"delay":0}'><span class="text-primary me-3 fas fa-users"></span>Awesome Team</h5>
                        <p class="mt-3 pe-3 pe-lg-5" data-zanim-xs='{"delay":0.1}'>Before talking destination, we shine a spotlight across your organization <br /> to fully understand it.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-3 mt-lg-0 px-4 px-sm-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <h5 data-zanim-xs='{"delay":0}'><span class="text-primary me-3 fas fa-comments"></span>Excellent Support</h5>
                        <p class="mt-3 pe-3 pe-lg-5" data-zanim-xs='{"delay":0.1}'>If you face any trouble, you can always let our dedicated support team help you. They are ready for you 24/7.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mt-3 mt-lg-0 px-4 px-sm-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <h5 data-zanim-xs='{"delay":0}'><span class="text-primary me-3 fas fa-bolt"></span>Faster Performance</h5>
                        <p class="mt-3 pe-3 pe-lg-5" data-zanim-xs='{"delay":0.1}'>We develop a systematic well-ordered process of analysis, from concept through implementation.</p>
                    </div>
                </div>
            </div>

        </section> -->
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-100">

            <div class="container">
                <div class="text-center mb-6">
                    <h3 class="fs-2 fs-md-3">Informasi Kegiatan</h3>
                    <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                </div>
                <div class="row g-0 position-relative mb-4 mb-lg-0">
                    <div class="col-lg-6 py-3 py-lg-0 mb-0 position-relative" style="min-height:400px;">
                        <div class="bg-holder rounded-ts-lg rounded-te-lg rounded-lg-te-0  " style="background-image:url(public/frontend/assets/img/6.jpg);">
                        </div>
                        <!--/.bg-holder-->

                    </div>
                    <div class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 bg-white rounded-bs-lg rounded-lg-bs-0 rounded-be-lg rounded-lg-be-0 rounded-lg-te-lg ">
                        <div class="elixir-caret d-none d-lg-block"></div>
                        <div class="d-flex align-items-center h-100">
                            <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim-xs='{"delay":0}'>Business Consulting</h5>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.1}'>As one of the world’s largest accountancy networks, elixir helps a diverse range of clients with a diverse range of needs.This is especially true of our Advisory Practice, which provides corporate finance and transaction services, business restructuring.</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div data-zanim-xs='{"delay":0.2}'><a class="d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!">Learn More
                                            <div class="overflow-hidden ms-2"><span class="d-inline-block" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>&xrarr;</span></div>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0 position-relative mb-4 mb-lg-0">
                    <div class="col-lg-6 py-3 py-lg-0 mb-0 position-relative order-lg-2" style="min-height:400px;">
                        <div class="bg-holder rounded-ts-lg rounded-te-lg rounded-lg-te-0  rounded-lg-ts-0" style="background-image:url(public/frontend/assets/img/7.jpg);">
                        </div>
                        <!--/.bg-holder-->

                    </div>
                    <div class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 bg-white rounded-bs-lg rounded-lg-bs-0 rounded-be-lg  rounded-lg-be-0">
                        <div class="elixir-caret d-none d-lg-block"></div>
                        <div class="d-flex align-items-center h-100">
                            <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim-xs='{"delay":0}'>Tax consulting</h5>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.1}'>Elixir serves clients across the country and around the world as they navigate an increasingly complex tax landscape. Our tax professionals draw on deep experience and industry-specific knowledge to deliver clients the insights and innovation they need.</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div data-zanim-xs='{"delay":0.2}'><a class="d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!">Learn More
                                            <div class="overflow-hidden ms-2"><span class="d-inline-block" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>&xrarr;</span></div>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0 position-relative mb-4 mb-lg-0">
                    <div class="col-lg-6 py-3 py-lg-0 mb-0 position-relative" style="min-height:400px;">
                        <div class="bg-holder rounded-ts-lg rounded-te-lg rounded-lg-te-0 rounded-lg-ts-0 rounded-bs-0 rounded-lg-bs-lg " style="background-image:url(public/frontend/assets/img/8.jpg);">
                        </div>
                        <!--/.bg-holder-->

                    </div>
                    <div class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 bg-white rounded-bs-lg rounded-lg-bs-0 rounded-be-lg  ">
                        <div class="elixir-caret d-none d-lg-block"></div>
                        <div class="d-flex align-items-center h-100">
                            <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim-xs='{"delay":0}'>Advisory</h5>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.1}'>To help you understand what this road looks like, we surveyed 1165 digital marketers across Europe and North America to explore current trends and priorities in digital marketing.</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div data-zanim-xs='{"delay":0.2}'><a class="d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!">Learn More
                                            <div class="overflow-hidden ms-2"><span class="d-inline-block" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>&xrarr;</span></div>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-7">
                    <div class="col-sm-6 col-lg-4 px-4 px-sm-3 mb-4 mb-lg-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <h5 data-zanim-xs='{"delay":0}'><span class="text-primary fs-0 me-3 far fa-credit-card"></span>Special financing</h5>
                        <p class="mt-3 pe-3 pe-lg-5 mb-0" data-zanim-xs='{"delay":0.1}'>Apply for special financial support and earn exclusive rewards.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 px-4 px-sm-3 mb-4 mb-lg-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <h5 data-zanim-xs='{"delay":0}'><span class="text-primary fs-0 me-3 fas fa-comment-alt"></span>Chat with team</h5>
                        <p class="mt-3 pe-3 pe-lg-5 mb-0" data-zanim-xs='{"delay":0.1}'>Have a question? Chat online with an expert. <a href='#!'>Start chatting <span class='fas fa-external-link-alt ms-1'></span></a></p>
                    </div>
                    <div class="col-sm-6 col-lg-4 px-4 px-sm-3 mb-4 mb-lg-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <h5 data-zanim-xs='{"delay":0}'><span class="text-primary fs-0 me-3 fas fa-phone-alt"></span>Call a specialist</h5>
                        <p class="mt-3 pe-3 pe-lg-5 mb-0" data-zanim-xs='{"delay":0.1}'>Our 24/7 support team is ready for you at 1-800-MY-Elixir.</p>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="text-center">

            <div class="container">
                <div class="text-center">
                    <h3 class="fs-2 fs-md-3">Jenis Layanan</h3>
                    <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="px-3 py-4 px-lg-4">
                            <div class="overflow-hidden"><img src="<?= base_url('public/frontend') ?>/assets/img/icons/sharing.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                            <div class="overflow-hidden">
                                <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Creative Support</h5>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We transform brands, grow businesses, and tell brand and product stories in a most creative way.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="px-3 py-4 px-lg-4">
                            <div class="overflow-hidden"><img src="<?= base_url('public/frontend') ?>/assets/img/icons/mail.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                            <div class="overflow-hidden">
                                <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Creating Experiences</h5>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We cover a large range of creative platforms and digital projects with one purpose: to create experiences.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="px-3 py-4 px-lg-4">
                            <div class="overflow-hidden"><img src="<?= base_url('public/frontend') ?>/assets/img/icons/target.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                            <div class="overflow-hidden">
                                <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Product Consulting</h5>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We guide you through the pipelines that generate new products with higher potential and lower risk.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="px-3 py-4 px-lg-4">
                            <div class="overflow-hidden"><img src="<?= base_url('public/frontend') ?>/assets/img/icons/world-globe.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                            <div class="overflow-hidden">
                                <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Business Boosting</h5>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We provide energy-efficient and environmentally conservative solutions to our clients to boost their business.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="px-3 py-4 px-lg-4">
                            <div class="overflow-hidden"><img src="<?= base_url('public/frontend') ?>/assets/img/icons/money.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                            <div class="overflow-hidden">
                                <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Strategic Approach</h5>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mb-0" data-zanim-xs='{"delay":0.2}'>Based on solid strategic framework and real, relevant research, we create prototypes, not presentations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="px-3 py-4 px-lg-4">
                            <div class="overflow-hidden"><img src="<?= base_url('public/frontend') ?>/assets/img/icons/data-analytics.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                            <div class="overflow-hidden">
                                <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Logistic Consulting</h5>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We work buy side and sell side to give our clienrts hard hitting answers and focus hard on best opportunities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <!-- <section>

            <div class="container">
                <div class="text-center mb-7">
                    <h3 class="fs-2 fs-md-3">Why Choose Elixir</h3>
                    <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                </div>
                <div class="row">
                    <div class="col-lg-6 pe-lg-3"><img class="rounded-3 img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/why-choose-us.jpg" alt="about" /></div>
                    <div class="col-lg-6 px-lg-5 mt-6 mt-lg-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <div class="px-4 px-sm-0" data-zanim-xs='{"delay":0}'>
                                <h5 class="fs-0 fs-lg-1"><span class="fas fa-comment-dots fs-1 me-2" data-fa-transform="flip-h"></span>We Are Professional</h5>
                                <p class="mt-3">We resource, train, speak, mentor and encourage; marketplace leaders, business owners and career professionals to be effective in the workplace.</p>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div class="px-4 px-sm-0 mt-5" data-zanim-xs='{"delay":0}'>
                                <h5 class="fs-0 fs-lg-1"><span class="fas fa-palette fs-1 me-2" data-fa-transform="shrink-1"></span>We Are Creative</h5>
                                <p class="mt-3">With so many factors to consider when deciding how to characterize your company , wouldn’t it be great to have a group of forward-thinking, well-informed individuals on board who know what they’re doing?</p>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div class="px-4 px-sm-0 mt-5" data-zanim-xs='{"delay":0}'>
                                <h5 class="fs-0 fs-lg-1"><span class="fas fa-stopwatch fs-1 me-2" data-fa-transform="grow-1"></span>24/7 Great Support</h5>
                                <p class="mt-3">Design clever and compelling marketing strategies, improve product positioning, and drive conversion rates, Elixir is all time available to guide you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section> -->
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <!-- <section class="bg-primary py-6 text-center text-md-start">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md">
                        <h4 class="text-white mb-0">If you have any query related investment... <br class="d-md-none" />we are available 24/7</h4>
                    </div>
                    <div class="col-md-auto mt-md-0 mt-4"><a class="btn btn-light rounded-pill" href="<?= base_url('public/frontend') ?>/contact.html">Contact Us</a></div>
                </div>
            </div>

        </section> -->
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <!-- <section class="bg-primary">

            <div class="container">
                <div class="row align-items-center text-white">
                    <div class="col-lg-4">
                        <div class="border border-2 border-warning p-4 py-lg-5 text-center rounded-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <h4 class="text-white" data-zanim-xs='{"delay":0}'>Request a call back</h4>
                            </div>
                            <div class="overflow-hidden">
                                <p class="px-lg-1 text-100 mb-0" data-zanim-xs='{"delay":0.1}'>Would you like to speak to one of our financial advisers over the phone? Just submit your details and we’ll be in touch shortly. You can also email us if you would prefer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 ps-lg-5 mt-6 mt-lg-0">
                        <h5 class="text-white">I would like to discuss:</h5>
                        <form class="mt-4" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="hidden" name="to" value="username@domain.extension" />
                                    <input class="form-control" type="text" placeholder="Your Name" aria-label="Your Name" />
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="Phone Number" aria-label="Phone Number" />
                                </div>
                                <div class="col-6 mt-4">
                                    <input class="form-control" type="text" placeholder="Subject" aria-label="Subject" />
                                </div>
                                <div class="col-6 mt-4">
                                    <button class="btn btn-warning w-100" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section> -->
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-100">

            <div class="container">
                <div class="text-center mb-6">
                    <h3 class="fs-2 fs-md-3">Koleksi Buku</h3>
                    <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card"><a href="<?= base_url('public/frontend') ?>/news/news.html"><img class="card-img-top" src="<?= base_url('public/frontend') ?>/assets/img/9.jpg" alt="Featured Image" /></a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= base_url('public/frontend') ?>/news/news.html">
                                        <h5 data-zanim-xs='{"delay":0}'>Tax impacts of lease mean accounting change</h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Paul O'Sullivan</p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.2}'>HMRC released a consultation document to flag some potential tax impacts that a forthcoming change...</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= base_url('public/frontend') ?>/news/news.html">Learn More
                                            <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card"><a href="<?= base_url('public/frontend') ?>/news/news.html"><img class="card-img-top" src="<?= base_url('public/frontend') ?>/assets/img/10.jpg" alt="Featured Image" /></a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= base_url('public/frontend') ?>/news/news.html">
                                        <h5 data-zanim-xs='{"delay":0}'>What brexit means for data protection law</h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Enrico Ambrosi</p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Assuming that the referendum is not ignored completely, there are two possible futures for the UK...</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= base_url('public/frontend') ?>/news/news.html">Learn More
                                            <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card"><a href="<?= base_url('public/frontend') ?>/news/news.html"><img class="card-img-top" src="<?= base_url('public/frontend') ?>/assets/img/11.jpg" alt="Featured Image" /></a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= base_url('public/frontend') ?>/news/news.html">
                                        <h5 data-zanim-xs='{"delay":0}'>The growing meanace of social engineering fraud</h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Robson</p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Social engineering involves the collection of information from various sources about a target...</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= base_url('public/frontend') ?>/news/news.html">Learn More
                                            <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <!-- <section>

            <div class="bg-holder overlay overlay-elixir" style="background-image:url(assets/img/background-15.jpg);">
            </div>

            <div class="container">
                <div class="d-flex"><span class="me-3"> <img src="<?= base_url('public/frontend') ?>/assets/img/checkmark.png" alt="checkmark" style="width: 55px" /></span>
                    <div class="flex-1">
                        <h2 class="text-warning fs-3 fs-lg-4">Take the right step,<br /><span class="text-white">do the big things.</span></h2>
                        <div class="row mt-4 pe-lg-10">
                            <div class="overflow-hidden col-md-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":52}'>52</div>
                                <h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Cases Solved</h6>
                            </div>
                            <div class="overflow-hidden col col-lg-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":164}'>164</div>
                                <h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Trained Experts</h6>
                            </div>
                            <div class="w-100 d-flex d-lg-none"></div>
                            <div class="overflow-hidden col-md-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":38}'>38</div>
                                <h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Branches</h6>
                            </div>
                            <div class="overflow-hidden col col-lg-3" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="fs-3 fs-lg-4 mb-0 fw-bold text-white mt-lg-5 mt-3 lh-xs" data-zanim-xs='{"delay":0.1}' data-countup='{"endValue":100}'>100</div>
                                <h6 class="fs-0 text-white" data-zanim-xs='{"delay":0.2}'>Satisfied Clients</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section> -->
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <!-- <div class="bg-200 py-6">
            <div class="container">
                <div class="row align-items-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="col-4 col-md-2 my-3 overflow-hidden"><img class="img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/partner/logo2.png" alt="partnerco" data-zanim-xs="{}" /></div>
                    <div class="col-4 col-md-2 my-3 overflow-hidden"><img class="img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/partner/logo1.png" alt="tvc" data-zanim-xs="{}" /></div>
                    <div class="col-4 col-md-2 my-3 overflow-hidden"><img class="img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/partner/logo6.png" alt="arcade" data-zanim-xs="{}" /></div>
                    <div class="col-4 col-md-2 my-3 overflow-hidden"><img class="img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/partner/logo3.png" alt="bearbrand" data-zanim-xs="{}" /></div>
                    <div class="col-4 col-md-2 my-3 overflow-hidden"><img class="img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/partner/logo5.png" alt="fast brothers" data-zanim-xs="{}" /></div>
                    <div class="col-4 col-md-2 my-3 overflow-hidden"><img class="img-fluid" src="<?= base_url('public/frontend') ?>/assets/img/partner/logo4.png" alt="harculis beards" data-zanim-xs="{}" /></div>
                </div>
            </div>
        </div> -->
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!--===============================================-->
    <!--    Footer-->
    <!--===============================================-->


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section style="background-color: #3D4C6F">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="bg-primary text-white p-5 p-lg-6 rounded-3">
                        <h4 class="text-white fs-1 fs-lg-2 mb-1">LPPMI UNUSIA</h4><br>
                        <ul class="list-unstyled">
                            <li class="mb-0"><a class="text-decoration-none d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!"> <span class="brand-icon me-3"><span class="fas fa-map-marked-alt"></span></span>
                                    <p class="fs-0 text-white mb-0 d-inline-block">Jl. Taman Amir Hamzah No.5 Menteng, Jakarta</p>
                                </a></li>
                            <li class="mb-0"><a class="text-decoration-none d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!"> <span class="brand-icon me-3"><span class="fas fa-mail-bulk"></span></span>
                                    <p class="fs-0 text-white mb-0 d-inline-block">lppmi@unusia.ac.id</p>
                                </a></li>
                        </ul>
                        <!-- <p class="text-white">Lembaga Pengawasan dan Penjaminan Mutu Internal</p> -->
                        <!-- <p class="text-white">Jl. Taman Amir Hamzah No.5 Menteng, Jakarta Pusat <br>
                lppmi@unusia.ac.id | 081258881926</p> -->

                        <!-- <p class="text-white"></p> -->
                        <!-- <form class="mt-4">
                <div class="row align-items-center">
                  <div class="col-md-7 pe-md-0">
                    <div class="input-group">
                      <input class="form-control" type="email" placeholder="Enter Email Here" />
                    </div>
                  </div>
                  <div class="col-md-5 mt-3 mt-md-0">
                    <div class="d-grid">
                      <button class="btn btn-warning" type="submit"><span class="text-primary fw-semi-bold">Submit</span></button>
                    </div>
                  </div>
                </div>
              </form> -->
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="row">
                        <div class="col-6 col-lg-4 text-white ms-lg-auto">
                            <ul class="list-unstyled">
                                <li class="mb-3"><a class="text-white" href="<?= base_url('public/frontend') ?>/contact.html">Contact Us</a></li>
                                <!-- <li class="mb-3"><a class="text-white" href="<?= base_url('public/frontend') ?>/#!">FAQ</a></li> -->
                                <li class="mb-3"><a class="text-white" href="<?= base_url('public/frontend') ?>/#!">Privacy Policy</a></li>
                                <li class="mb-3"><a class="text-white" href="<?= base_url('public/frontend') ?>/#!">Terms of Use</a></li>
                                <li class="mb-3"><a class="text-white" href="<?= base_url('public/frontend') ?>/#!">Global Office</a></li>
                                <li class="mb-3"><a class="text-white" href="<?= base_url('public/frontend') ?>/#!">Local Office</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-5 ms-sm-auto">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a class="text-decoration-none d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!"> <span class="brand-icon me-3"><span class="fab fa-linkedin-in"></span></span>
                                        <h5 class="fs-0 text-white mb-0 d-inline-block">Linkedin</h5>
                                    </a></li>
                                <li class="mb-2"><a class="text-decoration-none d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!"> <span class="brand-icon me-3"><span class="fab fa-twitter"></span></span>
                                        <h5 class="fs-0 text-white mb-0 d-inline-block">Twitter</h5>
                                    </a></li>
                                <li class="mb-2"><a class="text-decoration-none d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!"> <span class="brand-icon me-3"><span class="fab fa-facebook-f"></span></span>
                                        <h5 class="fs-0 text-white mb-0 d-inline-block">Facebook</h5>
                                    </a></li>
                                <li class="mb-2"><a class="text-decoration-none d-flex align-items-center" href="<?= base_url('public/frontend') ?>/#!"> <span class="brand-icon me-3"><span class="fab fa-google-plus-g"></span></span>
                                        <h5 class="fs-0 text-white mb-0 d-inline-block">Google+</h5>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


    <footer class="footer bg-primary text-center py-4">
        <div class="container">
            <div class="row align-items-center opacity-85 text-white">
                <div class="col-sm-3 text-sm-start"><a href="<?= base_url('public/frontend') ?>/index.html"><img src="<?= base_url('public/frontend') ?>/assets/img/logo-light.png" alt="logo" /></a></div>
                <div class="col-sm-6 mt-3 mt-sm-0">
                    <p class="lh-lg mb-0 fw-semi-bold">&copy; Copyright 2021 Elixir Inc.</p>
                </div>
                <!-- <div class="col text-sm-end mt-3 mt-sm-0"><span class="fw-semi-bold">Designed by </span><a class="text-white" href="<?= base_url('public/frontend') ?>/https://themewagon.com/" target="_blank">Themewagon</a></div> -->
            </div>
        </div>
    </footer>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?= base_url('public/frontend') ?>/vendors/popper/popper.min.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/is/is.min.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/bigpicture/BigPicture.js"> </script>
    <script src="<?= base_url('public/frontend') ?>/vendors/countup/countUp.umd.js"> </script>
    <script src="<?= base_url('public/frontend') ?>/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/lodash/lodash.min.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/gsap/gsap.js"></script>
    <script src="<?= base_url('public/frontend') ?>/vendors/gsap/customEase.js"></script>
    <script src="<?= base_url('public/frontend') ?>/assets/js/theme.js"></script>

</body>

</html>