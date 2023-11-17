<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <title><?= $settingAppLayout['judul_web'] ?> | <?= $currentModule['module'] ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/frontend') ?>/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public/frontend') ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/frontend') ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('public/frontend') ?>/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url('public/frontend') ?>/assets/img/favicons/manifest.json">

    <link href="<?= base_url('public/frontend') ?>/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url('public/frontend') ?>/vendors/hamburgers/hamburgers.min.css" rel="stylesheet">
    <link href="<?= base_url('public/frontend') ?>/vendors/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="<?= base_url('public/frontend') ?>/assets/css/theme.css" rel="stylesheet" />
    <link href="<?= base_url('public/frontend') ?>/assets/css/user.css" rel="stylesheet" />
    <link rel="preconnect" href="<?= base_url('public/frontend') ?>/https://fonts.googleapis.com">
    <link rel="preconnect" href="<?= base_url('public/frontend') ?>/https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">

    <script src="<?= base_url('public/frontend') ?>/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script type="text/javascript">
        let baseURL = "<?= $baseURL; ?>";
        let currentURL = "<?= $currentURL ?>";
        let moduleURL = "<?= $moduleURL ?>";
    </script>
</head>


<body>
    <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
        <div class="container">
            <div class="row align-items-center gx-4">
                <div class="col-auto d-none d-lg-block fs--1">
                    <span class="fas fa-clock text-warning me-2" data-fa-transform="grow-3"></span>
                    Senin-Jumat, 09.00-20.00 WIB.
                </div>

                <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center">
                    <span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span>
                    Jl. Taman Amir Hamzah No.5, Menteng, Jakarta Pusat 10320
                </div>

                <div class="col-auto">
                    <span class="fas fa-phone-alt text-warning" data-fa-transform="shrink-3"></span>
                    <a class="ms-2 fs--1 d-inline text-white fw-bold" href="<?= base_url('public/frontend') ?>/tel:2123865575">
                        021-12345678
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-top navbar-elixir">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="<?= base_url('public/frontend') ?>/index.html"><img src="<?= base_url('public/frontend') ?>/assets/img/logo-dark.png" alt="logo" /></a>
                <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
                <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
                    <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                        <li class="nav-item dropdown"><a class="nav-link" href="<?= base_url(); ?>" role="button">Beranda</a></li>
                        <?php
                        $list_menu = list_menu($menu_frontend);
                        echo build_menu_frontend($currentModule, $list_menu);
                        ?>
                    </ul>

                    <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0" href="<?= $settingAppLayout['peminjaman_buku']; ?>" target="_blank">Layanan Peminjaman Buku</a>
                </div>
            </nav>
        </div>
    </div>

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
                        <div class="bg-holder" style="background-image:url(public/frontend/assets/img/header-6.jpg);"></div>

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
                        <div class="bg-holder" style="background-image:url(public/frontend/assets/img/header-5.jpg);"></div>

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
                        <div class="bg-holder" style="background-image:url(public/frontend/assets/img/header-1.jpg);"></div>

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

        <section class="bg-100">

            <div class="container">
                <div class="row align-items-stretch justify-content-center mb-4">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-body px-5">
                                <h5 class="mb-3">Head Office</h5>
                                <p class="mb-0 text-1100">
                                    Jl. Taman Amir Hamzah No.5,
                                    Menteng, Jakarta Pusat 10320
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-body px-5">
                                <h5 class="mb-3">Jam Operasional Layanan</h5>
                                <p class="mb-0 text-1100">
                                    Senin - Jumat : 09.00 - 20.00 WIB <br>
                                    Sabtu : 09.00 - 17.30 WIB <br>
                                    Hari Minggu dan Libur Nasional Tutup <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card h-100">
                            <div class="card-body px-5">
                                <h5>Sosial Media</h5>

                                <a class="d-inline-block mt-2" href="#!">
                                    <svg class="svg-inline--fa fa-linkedin fa-w-14 fs-2 me-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                    </svg>
                                </a>

                                <a class="d-inline-block mt-2" href="#!">
                                    <svg class="svg-inline--fa fa-twitter-square fa-w-14 fs-2 mx-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path>
                                    </svg>
                                </a>

                                <a class="d-inline-block mt-2" href="#!">
                                    <svg class="svg-inline--fa fa-facebook-square fa-w-14 fs-2 mx-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path>
                                    </svg>
                                </a>

                                <a class="d-inline-block mt-2" href="#!">
                                    <svg class="svg-inline--fa fa-google-plus-square fa-w-14 fs-2 ms-2 text-primary" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-plus-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM164 356c-55.3 0-100-44.7-100-100s44.7-100 100-100c27 0 49.5 9.8 67 26.2l-27.1 26.1c-7.4-7.1-20.3-15.4-39.8-15.4-34.1 0-61.9 28.2-61.9 63.2 0 34.9 27.8 63.2 61.9 63.2 39.6 0 54.4-28.5 56.8-43.1H164v-34.4h94.4c1 5 1.6 10.1 1.6 16.6 0 57.1-38.3 97.6-96 97.6zm220-81.8h-29v29h-29.2v-29h-29V245h29v-29H355v29h29v29.2z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="text-center">

            <div class="container">
                <div class="text-center">
                    <h3 class="fs-2 fs-md-3">Layanan Kami</h3>
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

        </section>

        <section class="bg-100">

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

        </section>

        <section class="bg-white">

            <div class="container">
                <div class="text-center mb-6">
                    <h3 class="fs-2 fs-md-3">Event & Informasi</h3>
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

    </main>

    <section style="background-color: #3D4C6F">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="bg-primary text-white p-5 p-lg-6 rounded-3">
                        <h4 class="text-white fs-1 fs-lg-2 mb-1">Start reading e-book via Unusia library Apps!</h4>
                        <!-- <p class="text-white">Let's Go!</p> -->
                        <div class="mt-4">
                            <div class="row align-items-center">
                                <div class="col-md-6 pe-md-0">
                                    <div class="d-grid">
                                        <a href="https://play.google.com/store/apps/details?id=id.kubuku.kbk755360d" class="btn btn-warning" target="_blank">
                                            <span class="text-primary fw-semi-bold">
                                                <i class="fab fa-google-play"></i> Play Store
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <div class="d-grid">
                                        <a href="https://apps.apple.com/id/app/perpustakaan-univ-nu-indonesia/id6468444123" class="btn btn-warning" target="_blank">
                                            <span class="text-primary fw-semi-bold">
                                                <i class="fab fa-apple"></i> Apple Store
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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