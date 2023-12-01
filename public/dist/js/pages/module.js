
$(document).ready(function () {
    dataTables = $('#table-result').DataTable({
        "processing": true,
        "responsive": true,
        "serverSide": true,
        "ordering": true,
        "ajax": {
            url: currentURL + '/ajaxGetData',
            type: 'POST',
            data: function(response) {
                // response.<?= csrf_token() ?> = '<?= csrf_hash() ?>';
                // var FormData = $('#FormFilterconfiguser').serializeArray();
                // $.each(FormData, function(key, val) {
                //     response[val.name] = val.value;
                // });
            },
            timeout: 120000,
        },
        "filter": true,
        "order": [
            [1, "asc"]
        ],
        fnRowCallback: function(row, response, iDisplayIndex, iDisplayIndexFull) {
            // if (data.active == 0) {
            //     $('td', row).css('background-color', 'Red');
            // }
        },
        "columns": [{
                mData: null,
                title: 'No',
                orderable: false,
                render: function(response, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                mData: null,
                title: 'Nama Module',
                render: function(response, row, type, meta) {
                    return response.module;
                }
            },
            {
                mData: null,
                title: 'URL',
                render: function(response, row, type, meta) {
                    return response.module_url;
                }
            },
            {
                mData: null,
                title: 'Type',
                render: function(response, row, type, meta) {
                    return response.module_type;
                }
            },
            {
                mData: null,
                title: 'Login?',
                render: function(response, row, type, meta) {
                    return getModuleIsLogin(response.is_login);
                }
            },
            {
                mData: null,
                title: 'Status',
                render: function(response, row, type, meta) {
                    return getModuleStatus(response.module_status);
                }
            },
            {
                mData: null,
                title: 'Aksi',
                sortable: false,
                class: 'text-center',
                render: function(response, row, type, meta) {
                    let button = '';
                    button += '<button type="button" class="btn btn-primary btn-sm btn-edit mr-2" data-id="' + response.module_id + '"><i class="fa fa-pen"></i> Ubah</button>';
                    button += '<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="' + response.module_id + '" data-message-delete="Apakah anda yakin, Data module : <b>' + response.module + '</b> akan dihapus?"><i class="fa fa-trash-alt"></i> Hapus</button>';
                    return button;
                }
            }
        ],
    });

    $('#table-result').delegate('.btn-delete', 'click', function(e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        $bootbox = bootbox.confirm({
            message: $(this).attr('data-message-delete'),
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
            callback: function(confirmed) {
                let $button = $bootbox.find('button').prop('disabled', true);
                let $button_submit = $bootbox.find('button.bootbox-accept');
                if (confirmed) {
                    $spinner = $('<i class="fas fa-circle-notch fa-spin"></i>');
                    $spinner.prependTo($button_submit);
                    $.ajax({
                        type: 'POST',
                        url: currentURL + '/ajaxDeleteData',
                        data: 'id=' + id,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status) {
                                showAlert('success',response.message);
                            } else {
                                showAlert('error',response.message);
                            }
                            $button.prop('disabled', false);
                            $spinner.remove();
                            $bootbox.modal('hide');
                            $('.btn-refresh').click();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $bootbox.modal('hide');
                            alert(jqXHR.responseText);
                        }
                    })

                    return false;
                }
            },
            // centerVertical: true
        });
    });

    $('#table-result').delegate('.btn-edit', 'click', function(e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        $bootbox = showForm('Ubah', id);
    });

    $('.box-body').delegate('.btn-add', 'click', function(e) {
        e.preventDefault();
        $bootbox = showForm('Simpan');
    });

    function showForm(type = 'Simpan', id = '') {
        var $button = '';
        var $bootbox = '';
        var $button_submit = '';

        $bootbox = bootbox.dialog({
            title: type == 'Ubah' ? 'Ubah module' : 'Tambah module',
            message: '<div class="text-center"><i class="fas fa-circle-notch fa-spin fa-2x"></i></div>',
            buttons: {
                cancel: {
                    label: 'Batal',
                    className: 'btn-default'
                },
                success: {
                    label: type,
                    className: 'btn-primary bootbox-submit',
                    callback: function() {
                        $button_submit.prepend('<i class="fas fa-circle-notch fa-spin"></i>');
                        $button_submit.prop('disabled', true);
                        $form_filled = $bootbox.find('form');

                        $.ajax({
                            type: "POST",
                            url: currentURL + '/ajaxSaveData',
                            data: $form_filled.serialize() + '&method=' + type,
                            dataType: "json",
                            success: function(response) {
                                if (response.status == true) {
                                    showAlert('success', response.message);
                                    $bootbox.modal('hide');
                                    $('.btn-refresh').click();
                                } else {
                                    if (response.error_input) {
                                        for (let i = 0; i < response.error_input.length; i++) {
                                            $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                            $('[name="' + response.error_input[i] + '"]').next('.help-block').text(response.error_string[i]);
                                        }
                                    }
            
                                    if (response.status == 'required') {
                                        showAlert('error', response.message);
                                    }
                                }

                                $button_submit.find('i').remove();
                                $button_submit.prop('disabled', false);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                $bootbox.modal('hide');
                                alert(jqXHR.responseText);
                            }
                        });

                        return false;
                    }
                }
            }
        });

        $button = $bootbox.find('button').prop('disabled', true);
        $button_submit = $bootbox.find('button.bootbox-submit');
        $button.prop('disabled', true);

        $.ajax({
            type: "GET",
            url: currentURL + '/ajaxGetForm',
            data: 'id=' + id,
            success: function(response) {
                $button.prop('disabled', false);
                $bootbox.find('.modal-body').html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $bootbox.modal('hide');
                alert(jqXHR.responseText);
            }
        });
        return $bootbox;
    }
});