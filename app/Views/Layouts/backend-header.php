<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?> | <?= $setting['nama_website']; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('public'); ?>/assets/img/favicons/favicon.ico">
    <?php
    if (@$styles) {
        foreach ($styles as $file) {
            if (is_array($file)) {
                $attr = '';
                if (key_exists('attr', $file)) {
                    foreach ($file['attr'] as $param => $val) {
                        $attr .= $param . '="' . $val . '"';
                    }
                }
                $file = $file['url'];
                echo '<link rel="stylesheet" ' . $attr . ' type="text/css" href="' . $file . '?r=' . time() . '"/>' . "\n";
            } else {
                echo '<link rel="stylesheet" type="text/css" href="' . $file . '?r=' . time() . '"/>' . "\n";
            }
        }
    }
    ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/dist/css/AdminLTE.min.css?r=<?= time(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/dist/css/skins/_all-skins.min.css?r=<?= time(); ?>" />

    <script type="text/javascript">
        let baseURL = "<?= $baseURL; ?>";
        let currentURL = "<?= $currentURL ?>";
        let moduleURL = "<?= $moduleURL ?>";
        let themeURL = "<?= base_url() . '/public/dist/' ?>";
    </script>
</head>

<body class="hold-transition skin-blue">
    <div class="wrapper">

        <header class="main-header">
            <a href="<?= base_url(); ?>" class="logo" target="_blank">
                <span class="logo-lg"><img src="<?= base_url('public') ?>/assets/img/unulib-light.png" alt="logo" /></span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?= base_url(); ?>" target="_blank"><i class="fas fa-link"></i></a>
                        </li>

                        <li class="dropdown user user-menu">
                            <?php if ($userLogin['image'] != NULL) {
                                $image = base_url('public/images/users/') . $userLogin['image'];
                            } else {
                                $image = base_url('public/images/no_image.png');
                            }; ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= $image; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $userLogin['nama']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= $image; ?>" class="img-circle" alt="User Image" style="border: 0px solid;">

                                    <p>
                                        <?php foreach ($userLogin['role'] as $key => $value) {
                                            echo '<span class="label label-default mr-1">' . $value['nama_role'] . '</span>';
                                        }; ?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <a href="<?= base_url('logout'); ?>" class="btn btn-default btn-block">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <form action="javascript:void(0);" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" id="q" class="form-control" placeholder="Cari Menu" autocomplete="off">
                        <span class="input-group-btn">
                            <button type="button" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <ul class="sidebar-menu" data-widget="tree">
                    <?php
                    foreach ($menu as $val) {
                        $menu_kategori = $val['kategori'];
                        if ($menu_kategori['is_active'] == 1) {
                            echo '<li class="header">' . $menu_kategori['nama_kategori'] . '</li>';
                        }
                        $list_menu = list_menu($val['menu']);
                        echo build_menu($currentModule, $list_menu);
                    }
                    ?>
                </ul>
            </section>
        </aside>

        <script type="text/javascript" src="<?= base_url('public') ?>/plugins/jquery/dist/jquery.min.js"></script>

        <div class="content-wrapper">
            <section class="content-header">
                <?= !empty($breadcrumb) ? breadcrumb($breadcrumb) : '' ?>
            </section>