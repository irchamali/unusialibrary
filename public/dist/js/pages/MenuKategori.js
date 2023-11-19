$(document).ready(function() {
    // Menu Kategori
    $('.kategori-container').delegate('.kategori-item', 'click', function() {
        var $this = $(this);
        if ($this.hasClass('processing'))
            return false;

        var id_kategori = $this.attr('data-id-kategori');
        var $list_menu = $('#list-menu');
        var $group_container = $('.menu-kategori-container');
        var $btn = $('.card-body').find('li');

        $btn.addClass('processing');
        $group_container.find('li').removeClass('list-group-item-primary active');
        $this.addClass('list-group-item-primary active');

        $list_menu.empty();
        $loader = $('<div class="text-center"><i class="fas fa-circle-notch fa-spin fa-2x"></i></div>').appendTo($list_menu);
        $.get(currentURL + '/ajaxGetMenuByMenuKategori?menu_kategori_id=' + id_kategori, function(data) {
            $loader.remove();
            $btn.removeClass('processing');
            if (data) {
                $('#list-menu').html(data);
            } else {
                $('#list-menu').html('<div class="alert alert-danger">Data menu tidak ditemukan</div>');
            }

            $('#list-menu').wdiMenuEditor('customInit');
        })

    });

    $('.kategori-container').delegate('.btn-edit', 'click', function(e) {
        e.stopPropagation();
        if ($(this).hasClass('disabled'))
            return false;

        $bootbox = showFormMenuKategori('Ubah', $(this).parents('li').eq(1).attr('data-id-kategori'));
        return false;
    });

    $('.kategori-container').delegate('.btn-delete', 'click', function(e) {
        e.stopPropagation();
        $this = $(this);
        // console.log('object');
        $li = $this.parents('li').eq(1);
        $li.addClass('processing list-group-item-secondary');
        $li.find('a').prop('disabled', true);
        $li.find('a').addClass('disabled');
        $li.prepend('<i class="fas fa-circle-notch fa-spin"></i>');

        refresh = false;
        if ($li.hasClass('list-group-item-primary')) {
            refresh = true;
        }

        $.ajax({
            type: 'POST',
            url: currentURL + '/ajaxDeleteMenuKategori',
            data: 'id=' + $li.attr('data-id-kategori'),
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $li.fadeOut('fast', function() {
                        $li.remove();
                        $li.remove();
                        if (refresh) {
                            $('#list-kategori').find('li').eq(0).click();
                        }
                    });
                } else {
                    // show_alert('Error !!!', response.message, 'error');
                }
            },
            error: function(xhr) {
                // show_alert('Error !!!', xhr.responseText, 'error');
            }
        });
    });

    $('.btn-add-menu-kategori').on('click', function(e) {
        e.preventDefault();
        $bootbox = showFormMenuKategori();
    });

    function showFormMenuKategori(type = 'Simpan', id = '') {
        var $button = '';
        var $bootbox = '';
        var $button_submit = '';

        $bootbox = bootbox.dialog({
            title: type == 'Ubah' ? 'Ubah Menu Kategori' : 'Tambah Menu Kategori',
            message: '<div class="text-center"><i class="fas fa-circle-notch fa-spin fa-2x"></i></div>',
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
                        $.ajax({
                            type: 'POST',
                            url: currentURL + '/ajaxSaveMenuKategori?id=' + id,
                            data: $form_filled.serialize(),
                            dataType: 'json',
                            success: function(response) {
                                $button_submit.find('i').remove();
                                $button.prop('disabled', false);

                                if (response.status) {
                                    $bootbox.modal('hide');
                                    nama_kategori = $form_filled.find('[name="nama_kategori"]').val();

                                    if (type == 'Ubah') {
                                        $('#list-kategori').find('li[data-id-kategori="' + id + '"]').find('.text').html(nama_kategori);
                                    } else {
                                        $template = $('#kategori-item-template').clone();
                                        $template.removeAttr('id');
                                        $template.attr('data-id-kategori', response.menu_kategori_id);
                                        $template.find('.text').html(nama_kategori);
                                        $template.insertBefore('.disabled');
                                        $template.fadeIn('fast');
                                    }

                                } else {
                                    for (let i = 0; i < response.error_input.length; i++) {
                                        $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                        $('[name="' + response.error_input[i] + '"]').next().text(response.error_string[i]);
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
        $button_submit = $bootbox.find('button.bootbox-submit');
        $button.prop('disabled', true);

        const url = currentURL + '/ajaxGetFormMenuKategori?id=' + id;
        $.get(url, function(result) {
            $button.prop('disabled', false);
            $bootbox.find('.modal-body').html(result);
        })
        return $bootbox;
    }

    dragKategori = dragula([document.getElementById('list-kategori-container')], {
        accepts: function(el, target, source, sibling) {
            if (!sibling) return false;
            return true;
        },
        moves: function(el, container, handle) {
            return !el.classList.contains('disabled')
        }
    });

    dragKategori.on('dragend', function(el) {
        urutan = [];
        $('#list-kategori').find('li').each(function(i, el) {
            id_kategori = $(el).attr('data-id-kategori');
            if (id_kategori) {
                urutan.push(id_kategori);
            }
        });

        $.ajax({
            type: 'POST',
            url: currentURL + '/ajaxUpdateUrutanMenuKategori',
            data: 'id=' + JSON.stringify(urutan),
            dataType: 'json',
            success: function(data) {
                if (data.status == 'error') {
                    // show_alert('Error !!!', data.message, 'error');
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        })
    });
});