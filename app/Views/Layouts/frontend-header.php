<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <?php
    setlocale(LC_TIME, 'id_ID.utf8');
    $hariIni = new DateTime();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $setting['nama_website']; ?></title>
    <meta name="description" content="<?= $setting['meta_deskripsi']; ?>">
    <meta name="keyword" content="<?= $setting['meta_keyword']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="<?= base_url(); ?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $setting['nama_website']; ?>" />
    <meta property="og:description" content="<?= $setting['meta_deskripsi']; ?>" />
    <meta property="og:url" content="<?= base_url(); ?>" />
    <!-- <meta property="og:image" content="https://www.unusia.ac.id/assets/images/logobig.jpg" /> -->
    <!-- <meta property="og:image:secure_url" content="https://www.unusia.ac.id/assets/images/logobig.jpg" /> -->
    <!-- <meta property="og:image:width" content="560" /> -->
    <!-- <meta property="og:image:height" content="315" /> -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?= $setting['meta_deskripsi']; ?>" />
    <meta name="twitter:title" content="<?= $setting['nama_website']; ?>" />
    <!-- <meta name="twitter:site" content="https://twitter.com/unuindonesia" /> -->
    <!-- <meta name="twitter:image" content="https://www.unusia.ac.id/assets/images/logobig.jpg" /> -->

    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public'); ?>/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public'); ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public'); ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('public'); ?>/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url('public'); ?>/assets/img/favicons/manifest.json">

    <link href="<?= base_url('public'); ?>/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url('public'); ?>/vendors/hamburgers/hamburgers.min.css" rel="stylesheet">
    <link href="<?= base_url('public'); ?>/vendors/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="<?= base_url('public'); ?>/assets/css/theme.css" rel="stylesheet" />
    <link href="<?= base_url('public'); ?>/assets/css/user.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">

    <style>
        .line-short {
            padding: 0 0 0 10px;
            border-style: solid;
            border-width: 0 0 0 5px;
            border-radius: 0;
        }

        .ml-auto,
        .mx-auto {
            margin-left: auto !important;
        }
    </style>
    <script src="<?= base_url('public'); ?>/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script type="text/javascript" src="http://localhost/unusialibrary/public/plugins/jquery/dist/jquery.min.js"></script>
</head>


<body>
    <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
        <div class="container">
            <div class="row align-items-center gx-4">
                <div class="col-auto d-none d-lg-block">
                    <marquee scrollamount="3" scrolldelay="5" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                        <a href="JavaScript:void(0)" role="button">
                            <span class="text-white">SELAMAT DATANG DI WEBSITE RESMI PERPUSTAKAAN UNUSIA GRHA MAHBUB DJUNAEDI</span>
                        </a>
                    </marquee>
                </div>

                <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex align-items-center">
                    <span class="me-3"><?= strftime('%d %B, %Y', $hariIni->getTimestamp()); ?></span>
                    <a href="<?= $setting['facebook'] ? $setting['facebook'] : 'Javascript:void(0);'; ?>" target="_blank"><span class="fab fa-facebook text-warning me-3" data-fa-transform="grow-3"></span></a>
                    <a href="<?= $setting['instagram'] ? $setting['instagram'] : 'Javascript:void(0);'; ?>" target="_blank"><span class="fab fa-instagram text-warning me-3" data-fa-transform="grow-3"></span></a>
                    <a href="<?= $setting['whatsapp'] ? $setting['whatsapp'] : 'Javascript:void(0);'; ?>" target="_blank"><span class="fab fa-whatsapp text-warning me-3" data-fa-transform="grow-3"></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-top navbar-elixir">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <img src="<?= base_url('public/images/') . $setting['logo_header']; ?>" alt="<?= $setting['nama_website']; ?>" />
                </a>

                <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger hamburger--emphatic">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <?php
                        $list_menu = list_menu($menu_website);
                        echo build_menu_website($currentModule, $list_menu);
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- MAIN -->
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

        <!-- ISI -->