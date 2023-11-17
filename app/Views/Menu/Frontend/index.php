<style>
    /*  */
</style>

<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $title; ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            <button type="button" class="btn btn-sm <?= $settingAppLayout['button']; ?> btn-add-menu mb-3"><i class="fa fa-plus"></i> Tambah Menu</button>
            <div class="dd" id="list-menu">
                <?= $list_menu ?: '<div class="alert alert-danger">Data menu tidak ditemukan</div>' ?>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#list-menu').wdiMenuEditor({
            expandBtnHTML: '<button data-action="expand" class="text-secondary fas fa-plus mx-2" type="button">Expand</button>',
            collapseBtnHTML: '<button data-action="collapse" class="text-secondary fas fa-minus mx-2" type="button">Collapse</button>',
            editBtnCallback: function($list) {
                $bootbox = showForm('Ubah', $list.data('id'));
            },
            beforeRemove: function(item, plugin) {
                var $bootbox = bootbox.confirm({
                    message: "Apakah anda yakin, Data menu <b>" + item.attr('data-menu') + "</b> akan dihapus?<br/>Jika Ya, Maka semua submenu (jika ada) akan ikut terhapus",
                    buttons: {
                        confirm: {
                            label: 'Ya, Hapus data',
                            className: '' + buttonAppLayout
                        },
                        cancel: {
                            label: 'Batal',
                            className: 'btn-default'
                        }
                    },
                    callback: function(result) {
                        if (result) {
                            $button = $bootbox.find('button').prop('disabled', true);
                            $button_submit = $bootbox.find('button.submit');
                            $button_submit.prepend('<i class="fas fa-circle-notch fa-spin"></i>');

                            list_data = $('#list-menu').wdiMenuEditor('serialize');
                            menu_tree = JSON.stringify(list_data);

                            $.ajax({
                                type: 'POST',
                                url: currentURL + '/ajaxDeleteMenu',
                                data: 'id=' + item.attr('data-id') + '&menu_tree=' + menu_tree,
                                success: function(response) {
                                    response = $.parseJSON(response);
                                    if (response.status) {
                                        plugin.deleteList(item);
                                        if ($('#list-menu').find('li').length == 0) {
                                            $('#list-kategori').find('.list-group-item-primary').click();
                                        }
                                    } else {
                                        console.log(xhr);
                                    }
                                },
                                error: function() {
                                    console.log(xhr);
                                }
                            })
                        }
                    }

                });
            },

            // Drag end
            onChange: function(el) {
                list_data = $('#list-menu').wdiMenuEditor('serialize');
                data = JSON.stringify(list_data);
                $.ajax({
                    type: 'POST',
                    url: currentURL + '/ajaxUpdateUrutanMenu',
                    data: {
                        data: data
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'error') {
                            // show_alert('Error !!!', data.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        // show_alert('Error !!!', 'Ajax error, untuk detailnya bisa di cek di console browser', 'error');
                        console.log(xhr);
                    }
                });
            }
        });

        // $('#save-menu').submit(function(e) {
        //     list_data = $('#list-menu').wdiMenuEditor('serialize');
        //     data = JSON.stringify(list_data);
        //     $('#menu-data').empty().text(data);
        // })

        $('.btn-add-menu').on('click', function(e) {
            e.preventDefault();
            var $add_form = $('#form-edit').clone();
            var id = 'id_' + Math.random();
            $checkbox = $add_form.find('[type="checkbox"]').attr('id', id);
            $checkbox.siblings('label').attr('for', id);
            $bootbox = showForm('Simpan');
        });

        function showForm(type = 'Simpan', id = '') {
            var $button = '';
            var $button_submit = '';

            $bootbox = bootbox.dialog({
                title: type == 'Ubah' ? 'Ubah Menu' : 'Tambah Menu',
                message: '<div class="text-center"><div class="spinner-border text-secondary" role="status"></div>',
                buttons: {
                    cancel: {
                        label: 'Batal'
                    },
                    success: {
                        label: type,
                        className: buttonAppLayout + ' bootbox-submit',
                        callback: function() {
                            $bootbox.find('.alert').remove();
                            $button_submit.prepend('<i class="fas fa-circle-notch fa-spin"></i>');
                            $button.prop('disabled', true);
                            $form_filled = $bootbox.find('form');

                            list_data = $('#list-menu').wdiMenuEditor('serialize');
                            menu_tree = JSON.stringify(list_data);

                            $.ajax({
                                type: 'POST',
                                url: currentURL + '/ajaxSaveMenu',
                                data: $form_filled.serialize() + '&menu_tree=' + menu_tree,
                                dataType: 'text',
                                success: function(response) {

                                    response = $.parseJSON(response);

                                    if (response.status) {
                                        var nama_menu = $form_filled.find('input[name="nama_menu"]').val();
                                        var id = $form_filled.find('input[name="id"]').val();
                                        var use_icon = $form_filled.find('select[name="use_icon"]').val();
                                        var icon_class = $form_filled.find('input[name="icon_class"]').val();
                                        // edit
                                        if (id) {
                                            $menu = $('#list-menu').find('[data-id="' + id + '"]');
                                            $menu.find('.menu-title:eq(0)').text(nama_menu);
                                        } else {
                                            $menu_container = $('#list-menu').children();
                                            $menu = $menu_container.children(':eq(0)').clone();
                                            $menu.find('ol, ul').remove();
                                            $menu.find('[data-action="collapse"]').remove();
                                            $menu.find('[data-action="expand"]').remove();
                                            $menu.attr('data-id', response.id_menu);
                                            $menu.find('.menu-title').text(nama_menu);
                                        }

                                        $handler = $menu.find('.dd-handle:eq(0)');
                                        $handler.find('i').remove();

                                        if (use_icon == 1) {
                                            $handler.prepend('<i class="' + icon_class + '"></i>');
                                        }

                                        if (!id) {
                                            $menu_container.prepend($menu);
                                        }

                                        $bootbox.modal('hide');
                                        $('.menu-kategori-container').find('.list-group-item-primary').click();

                                    } else {
                                        if (response.error_query != undefined) {
                                            //    
                                        } else {
                                            // $bootbox.find('.modal-body').prepend('<div class="alert alert-dismissible alert-danger" role="alert">' + response.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                            for (let i = 0; i < response.error_input.length; i++) {
                                                $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                                $('[name="' + response.error_input[i] + '"]').next('.help-block').text(response.error_string[i]);
                                            }
                                        }
                                    }
                                    $button_submit.find('i').remove();
                                    $button.prop('disabled', false);
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                }
                            })
                            return false;
                        }
                    }
                }
            });

            $button = $bootbox.find('button').prop('disabled', true);
            $button_submit = $bootbox.find('button.submit');
            $button.prop('disabled', true);

            const url = currentURL + '/ajaxGetFormMenu?id=' + id;
            $.get(url, function(response) {
                $button.prop('disabled', false);
                $bootbox.find('.modal-body').html(response);

                if (type == 'Simpan') {
                    menu_kategori_id = $('#list-kategori').find('.list-group-item-primary').attr('data-id-kategori');
                    if (menu_kategori_id) {
                        $bootbox.find('select[name="menu_kategori_id"]').val(menu_kategori_id);
                    }
                }
            })

            return $bootbox;
        }
    });
</script>