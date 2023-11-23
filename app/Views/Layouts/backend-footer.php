</div>

<footer class="main-footer">
    <?php
    $footer = str_replace('{{YEAR}}', date('Y'), $setting['footer']);
    echo html_entity_decode($footer);
    ?>
</footer>
</div>

<?php
if (@$scripts) {
    foreach ($scripts as $file) {
        if (is_array($file)) {
            if ($file['print']) {
                echo '<script type="text/javascript">' . $file['script'] . '</script>' . "\n";
            }
        } else {
            echo '<script type="text/javascript" src="' . $file . '?r=' . time() . '"></script>' . "\n";
        }
    }
}
?>

<script>
    $(document).ready(function() {
        // $('body').delegate('form', 'submit', function(e) {
        //     e.preventDefault();
        //     return false;
        // });

        $('.sidebar-menu').tree();

        $('.sidebar-form').on('submit', function(e) {
            e.preventDefault();
        });

        $('.sidebar-menu li.active').data('lte.pushmenu.active', true);

        $('#q').on('keyup', function() {
            var term = $('#q').val().trim();
            if (term.length === 0) {
                $('.sidebar-menu li').each(function() {
                    $(this).show(0);
                    $(this).removeClass('active');
                    if ($(this).data('lte.pushmenu.active')) {
                        $(this).addClass('active');
                    }
                });
                return;
            }
            $('.sidebar-menu li').each(function() {
                if ($(this).text().toLowerCase().indexOf(term.toLowerCase()) === -1) {
                    $(this).hide(0);
                    $(this).removeClass('pushmenu-search-found', false);
                    if ($(this).is('.treeview')) {
                        $(this).removeClass('active');
                    }
                } else {
                    $(this).show(0);
                    $(this).addClass('pushmenu-search-found');
                    if ($(this).is('.treeview')) {
                        $(this).addClass('active');
                    }
                    var parent = $(this).parents('li').first();
                    if (parent.is('.treeview')) {
                        parent.show(0);
                    }
                }
                if ($(this).is('.header')) {
                    $(this).show();
                }
            });

            $('.sidebar-menu li.pushmenu-search-found.treeview').each(function() {
                $(this).find('.pushmenu-search-found').show(0);
            });
        });

        $('.btn-refresh').on('click', function() {
            dataTables.ajax.reload(null, false);
        });
    });

    function showAlert(type, message) {
        switch (type) {
            case 'error':
                title = 'Oops...';
                icon_type = 'error';
                break;
            case 'warning':
                title = 'Warning';
                icon_type = 'error';
                break;
            default:
                title = 'Good job!';
                icon_type = 'success';
                break;
        }

        Swal.fire({
            title: title,
            text: message,
            icon: icon_type
        });
    }

    function switchSkin(params) {
        switch (params) {
            case 'skin-blue':
                classButton = 'btn-primary';
                break;
            case 'skin-black':
                classButton = 'btn-default';
                break;
            case 'skin-purple':
                classButton = 'bg-purple';
                break;
            case 'skin-green':
                classButton = 'btn-success';
                break;
            case 'skin-red':
                classButton = 'btn-danger';
                break;
            case 'skin-yellow':
                classButton = 'btn-warning';
                break;
            case 'skin-blue-light':
                classButton = 'btn-primary';
                break;
            case 'skin-black-light':
                classButton = 'btn-default';
                break;
            case 'skin-purple-light':
                classButton = 'bg-purple';
                break;
            case 'skin-green-light':
                classButton = 'btn-success';
                break;
            case 'skin-red-light':
                classButton = 'btn-danger';
                break;
            case 'skin-yellow-light':
                classButton = 'btn-warning';
                break;
            default:
                classButton = 'btn-default';
                break;
        }
        return classButton;
    }

    function getStatus(params) {
        switch (params) {
            case '1':
                status = 'Aktif';
                break;
            case '0':
                status = 'Tidak Aktif';
                break;
            default:
                status = 'Aktif';
                break;
        }
        return status;
    }

    function getModuleStatus(params) {
        switch (params) {
            case 'Aktif':
                status = '<span class="label label-success">Aktif</span>';
                break;
            case 'Tidak Aktif':
                status = '<span class="label label-danger">Tidak Aktif</span>';
                break;
            case 'Dalam Pengembangan':
                status = '<span class="label label-warning">Dalam Pengembangan</span>';
                break;
            default:
                status = 'Aktif';
                break;
        }
        return status;
    }

    function getModuleIsLogin(params) {
        switch (params) {
            case 'Y':
                status = 'Ya';
                break;
            case 'N':
                status = 'Tidak';
                break;
            case 'R':
                status = 'Restrict';
                break;
            default:
                status = 'Ya';
                break;
        }
        return status;
    }
</script>
</body>

</html>