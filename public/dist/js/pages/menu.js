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
                        className: 'btn-primary'
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

        onChange: function(el) {
            list_data = $('#list-menu').wdiMenuEditor('serialize');
            data = JSON.stringify(list_data) + '&menu_kategori_id=' + $('.list-group-item-primary').attr('data-id-kategori');
            $.ajax({
                type: 'POST',
                url: currentURL + '/ajaxUpdateUrutanMenu',
                data: 'data=' + data,
                dataType: 'json',
                success: function(result) {
                    if (result.status) {
                        // show_alert('Error !!!', data.message, 'error');
                    } else {
                        // 
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
                    className: 'btn-primary bootbox-submit',
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
                                $button_submit.find('i').remove();
                                $button.prop('disabled', false);

                                if (response.status) {
                                    var nama_menu = $form_filled.find('input[name="nama_menu"]').val();
                                    var id = $form_filled.find('input[name="id"]').val();
                                    var use_icon = $form_filled.find('select[name="use_icon"]').val();
                                    var icon_class = $form_filled.find('input[name="icon_class"]').val();

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
                                    for (let i = 0; i < response.error_input.length; i++) {
                                        $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                        $('[name="' + response.error_input[i] + '"]').next('.help-block').text(response.error_string[i]);
                                    }
                                }
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

    $(document).on('change', 'select[name="use_icon"]', function() {
        $this = $(this);
        if (this.value == 1) {
            $icon_preview = $this.next().show();
            $this.next().show();
            var calass_name = $icon_preview.find('i').attr('class');
            $this.parent().find('[name="icon_class"]').val(calass_name);
        } else {
            $this.next().hide();
        }
    });

    $(document).on('click', '.icon-preview', function() {
        $bootbox.hide();
        $this = $(this);
        fapicker({
            iconUrl: baseURL + '/public/plugins/fontawesome/metadata/icons.yml',
            onSelect: function(elm) {
                $bootbox.show();
                var icon_class = $(elm).data('icon');
                $this.find('i').removeAttr('class').addClass(icon_class);
                $('[name="icon_class"]').val(icon_class);
            },
            onClose: function() {
                $bootbox.show();
            }
        });
    });
});