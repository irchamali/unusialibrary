<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?> | <?= $settingApp['title']; ?></title>
    <meta name="description" content="<?= $settingApp['description']; ?>">
    <meta name="keyword" content="<?= $settingApp['keyword']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="<?= base_url(); ?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $settingApp['title']; ?>" />
    <meta property="og:description" content="<?= $settingApp['description']; ?>" />
    <meta property="og:url" content="<?= base_url(); ?>" />
    <!-- <meta property="og:image" content="https://www.unusia.ac.id/assets/images/logobig.jpg" /> -->
    <!-- <meta property="og:image:secure_url" content="https://www.unusia.ac.id/assets/images/logobig.jpg" /> -->
    <!-- <meta property="og:image:width" content="560" /> -->
    <!-- <meta property="og:image:height" content="315" /> -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?= $settingApp['description']; ?>" />
    <meta name="twitter:title" content="<?= $settingApp['title']; ?>" />
    <!-- <meta name="twitter:site" content="https://twitter.com/unuindonesia" /> -->
    <!-- <meta name="twitter:image" content="https://www.unusia.ac.id/assets/images/logobig.jpg" /> -->


    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public') ?>/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public') ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public') ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('public') ?>/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url('public') ?>/assets/img/favicons/manifest.json">

    <link href="<?= base_url('public') . '/vendors/swiper/swiper-bundle.min.css?r=' . time(); ?>" rel="stylesheet">
    <link href="<?= base_url('public') . '/vendors/hamburgers/hamburgers.min.css?r=' . time(); ?>" rel="stylesheet">
    <link href="<?= base_url('public') . '/vendors/loaders.css/loaders.min.css?r=' . time(); ?>" rel="stylesheet">
    <link href="<?= base_url('public') . '/assets/css/theme.css?r=' . time(); ?>" rel="stylesheet" />
    <link href="<?= base_url('public') . '/assets/css/user.css?r=' . time(); ?>" rel="stylesheet" />
    <link href="<?= base_url('public/assets/css/fonts/') . $settingLayout['font_family'] . '.css?r=' . time(); ?>" rel="stylesheet" />
    <style type="text/css">
        html,
        body {
            font-size: <?= $settingLayout['font_size'] ?>px;
        }
    </style>
    <script src="<?= base_url('public') ?>/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script type="text/javascript">
        let baseURL = "<?= $baseURL; ?>";
        let currentURL = "<?= $currentURL ?>";
        let moduleURL = "<?= $moduleURL ?>";
        let themeURL = "<?= base_url() . '/public/dist/' ?>";
    </script>
</head>


<body>
    <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
        <div class="container">
            <div class="row align-items-center gx-4">
                <div class="col-auto d-none d-lg-block fs--1">
                    <span class="fas fa-book-open text-warning me-2" data-fa-transform="grow-3"></span>
                    <?= strtoupper($settingApp['title']); ?>
                </div>

                <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center">
                    <span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span>
                    <?= $settingProfile['alamat']; ?>
                </div>

                <div class="col-auto">
                    <span class="fas fa-phone-alt text-warning" data-fa-transform="shrink-3"></span>
                    <a class="ms-2 fs--1 d-inline text-white fw-bold" href="tel:<?= $settingProfile['phone']; ?>">
                        <?= $settingProfile['phone']; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-top navbar-elixir">
        <div class="container">
            <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="<?= base_url('') ?>"><img src="<?= base_url('public') ?>/assets/img/unulib-dark.png" alt="logo" /></a>
                <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
                <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
                    <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                        <?php
                        $list_menu = list_menu($menu_frontend);
                        echo build_menu_frontend($currentModule, $list_menu);
                        ?>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">E-Library</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= $settingLibrary['perpustakaan_digital_unusia']; ?>" target="_blank">Perpustakaan Digital Unusia</a></li>
                                <li><a class="dropdown-item" href="<?= $settingLibrary['perpustakaan_univ_nu_indonesia']; ?>" target="_blank">Perpustakaan Univ NU Indonesia</a></li>
                                <li><a class="dropdown-item" href="<?= $settingLibrary['perpustakaan_unusia']; ?>" target="_blank">Perpustakaan Unusia</a></li>
                            </ul>
                        </li>
                    </ul>

                    <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0" href="<?= $settingLibrary['peminjaman_buku']; ?>" target="_blank">Layanan Peminjaman Buku</a>
                </div>
            </nav>
        </div>
    </div>