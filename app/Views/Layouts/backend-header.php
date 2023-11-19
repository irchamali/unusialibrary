<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="<?= $settingApp['description']; ?>" />
    <title><?= $currentModule['module']; ?> | <?= $settingApp['title']; ?></title>
    <?php
    if (@$stylesBackend) {
        foreach ($stylesBackend as $file) {
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
    <link rel="stylesheet" type="text/css" id="font-switch" href="<?= base_url('public/dist/css/fonts/') . $settingLayout['font_family'] . '.css?r=' . time(); ?>" />
    <style>
        html,
        body {
            font-size: <?= $settingLayout['font_size'] ?>px;
        }
    </style>

    <script type="text/javascript">
        let baseURL = "<?= $baseURL; ?>";
        let currentURL = "<?= $currentURL ?>";
        let moduleURL = "<?= $moduleURL ?>";
        let themeSkin = '<?= $settingLayout['theme']; ?>';
        let buttonAppLayout = '<?= $settingLayout['button']; ?>';
        let themeURL = "<?= base_url() . '/public/dist/' ?>";
    </script>
</head>

<body class="hold-transition <?= $settingLayout['theme']; ?>" id="theme-switch">
    <div class="wrapper">

        <header class="main-header">
            <a href="<?= base_url(); ?>" class="logo" target="_blank">
                <span class="logo-mini"><b>PMD</b></span>
                <span class="logo-lg"><img src="<?= base_url('public') ?>/assets/img/unulib-light.png" alt="logo" /></span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url('public'); ?>/dist/img/image_no.png" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('public'); ?>/dist/img/image_no.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url('public'); ?>/dist/img/image_no.png" class="img-circle" alt="User Image" style="border: 0px solid;">

                                    <p>
                                        Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- <li class="user-body"></li> -->
                                <li class="user-footer">
                                    <a href="<?= base_url('login/logout'); ?>" class="btn btn-default btn-block">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

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

        <!-- =============================================== -->
        <script type="text/javascript" src="<?= base_url('public') ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- =============================================== -->
        <div class="content-wrapper">
            <section class="content-header">
                <?= !empty($breadcrumb) ? breadcrumb($breadcrumb) : '' ?>
            </section>