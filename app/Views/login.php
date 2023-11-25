<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="<?= $setting['meta_deskripsi']; ?>" />
    <title><?= $setting['nama_website']; ?></title>
    <link rel="stylesheet" href="<?= base_url('public') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/bower_components/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/dist/css/styleLTE.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>"><img src="<?= base_url('public') ?>/assets/img/unulib-dark.png" alt="logo" /></a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Silahkan login terlebih dahulu.</p>

            <div id="message"></div>

            <form id="form-login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    <span class="help-block"></span>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <span class="help-block"></span>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="<?= base_url('public') ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('public') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            let baseURL = "<?= base_url('dashboard'); ?>";

            $('form#form-login input').on('change', function() {
                $(this).parent('.form-group').removeClass('has-error');
                $(this).next('.help-block').text('');
                $('.alert').remove();
            });

            $('form#form-login').on('submit', function(e) {
                e.preventDefault();

                let $button = $('button').prop('disabled', true);
                let $button_login = $('button.btn-login');
                let $message = $('#message');

                $spinner = $('<i class="fas fa-circle-notch fa-spin mr-2"></i>');
                $spinner.prependTo($button_login);

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('login/ajaxCheckLogin'); ?>",
                    data: $('#form-login').serialize(),
                    dataType: "json",
                    success: function(response) {
                        $button.prop('disabled', false);
                        $spinner.remove();
                        $('.alert').remove();

                        if (response.status) {
                            $message.prepend('<div class="alert alert-success">' + response.message + '</div>');
                            $button.prop('disabled', true);
                            $spinner.prependTo($button_login);
                            setTimeout(function() {
                                window.location.href = baseURL;
                            }, 1000);
                        } else {
                            if (response.error_input) {
                                for (let i = 0; i < response.error_input.length; i++) {
                                    $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                    $('[name="' + response.error_input[i] + '"]').next().text(response.error_string[i]);
                                }
                            } else {
                                $message.prepend('<div class="alert alert-danger">' + response.message + '</div>');
                            }
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>