<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?= $settingAppLayout['judul_web'] ?> | <?= $currentModule['module'] ?></title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public') ?>/frontend/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public') ?>/frontend/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public') ?>/frontend/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('public') ?>/frontend/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url('public') ?>/frontend/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= base_url('public') ?>/frontend/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= base_url('public') ?>/frontend/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= base_url('public') ?>/frontend/vendors/hamburgers/hamburgers.min.css" rel="stylesheet">
    <link href="<?= base_url('public') ?>/frontend/vendors/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="<?= base_url('public') ?>/frontend/assets/css/theme.css" rel="stylesheet" />
    <link href="<?= base_url('public') ?>/frontend/assets/css/user.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">

    <script type="text/javascript">
        let baseURL = "<?= $baseURL; ?>";
        let currentURL = "<?= $currentURL ?>";
        let moduleURL = "<?= $moduleURL ?>";
    </script>
</head>


<body>
    <?php
    // echo "<pre>";
    // print_r($this->data);
    // echo "</pre>";
    ?>
    <div class="bg-primary py-3 d-none d-sm-block text-white fw-bold">
        <div class="container">
            <div class="row align-items-center gx-4">
                <div class="col-auto d-none d-lg-block fs--1"><span class="fas fa-map-marker-alt text-warning me-2" data-fa-transform="grow-3"></span>1010 Avenue, New York, NY 10018 US. </div>
                <div class="col-auto ms-md-auto order-md-2 d-none d-sm-flex fs--1 align-items-center"><span class="fas fa-clock text-warning me-2" data-fa-transform="grow-3"></span>Mon-Sat, 8.00-18.00. Sunday CLOSED</div>
                <div class="col-auto"><span class="fas fa-phone-alt text-warning" data-fa-transform="shrink-3"></span><a class="ms-2 fs--1 d-inline text-white fw-bold" href="tel:2123865575">212 386 5575, 212 386 5576</a></div>
            </div>
        </div>
    </div>
    <div class="sticky-top navbar-elixir">
        <div class="container">
            <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url('public') ?>/frontend/assets/img/logo-dark.png" alt="logo" /></a>
                <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger hamburger--emphatic"><span class="hamburger-box"><span class="hamburger-inner"></span></span></span></button>
                <div class="collapse navbar-collapse" id="primaryNavbarCollapse">
                    <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                        <?php
                        $list_menu = list_menu($menu_frontend);
                        echo build_menu_frontend($currentModule, $list_menu);
                        ?>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">E-Library</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= $settingAppLayout['perpustakaan_digital_unusia']; ?>" target="_blank">Perpustakaan Digital Unusia</a></li>
                                <li><a class="dropdown-item" href="<?= $settingAppLayout['perpustakaan_unusia']; ?>" target="_blank">Perpustakaan Unusia</a></li>
                                <li><a class="dropdown-item" href="<?= $settingAppLayout['perpustakaan_univ_nu_indonesia']; ?>" target="_blank">Perpustakaan Univ NU Indonesia</a></li>
                            </ul>
                        </li>
                    </ul>

                    <a class="btn btn-outline-primary rounded-pill btn-sm border-2 d-block d-lg-inline-block ms-auto my-3 my-lg-0" href="<?= $settingAppLayout['peminjaman_buku']; ?>" target="_blank">Layanan Peminjaman Buku</a>
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