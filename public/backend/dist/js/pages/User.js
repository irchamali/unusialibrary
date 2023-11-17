
$(document).ready(function () {
    $('.modal-body').css({"height": "70vh", "overflow-y": "auto"});
    if ($('#table-result').length) {
        dataTables_column = $.parseJSON($('#dataTables-column').html());
        dataTables_setting = $('#dataTables-setting');

        var settings = {
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "ajax": {
                "url": currentURL + '/ajaxGetData',
                "type": "POST",
                /* "dataSrc": function (json) {
                    console.log(json)
                } */
            },
            "columns": dataTables_column,
            "initComplete": function(settings, json) {
                dataTables.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    $row = $(this.node());
                    /* this
                        .child(
                            $(
                                '<tr>'+
                                    '<td>'+rowIdx+'.1</td>'+
                                    '<td>'+rowIdx+'.2</td>'+
                                    '<td>'+rowIdx+'.3</td>'+
                                    '<td>'+rowIdx+'.4</td>'+
                                '</tr>'
                            )
                        )
                        .show(); */
                });
            }
        }

        $setting = dataTables_setting;
        if ($setting.length > 0) {
            setting = $.parseJSON(dataTables_setting.html());
            for (k in setting) {
                settings[k] = setting[k];
            }
        }

        dataTables = $('#table-result').DataTable(settings);
    }

    $('#table-result').delegate('.btn-delete', 'click', function(e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        $bootbox = bootbox.confirm({
            message: $(this).attr('data-message-delete'),
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
            title: type == 'Ubah' ? 'Ubah User' : 'Tambah User',
            message: '<div class="text-center"><i class="fas fa-circle-notch fa-spin fa-2x"></i></div>',
            buttons: {
                cancel: {
                    label: 'Batal',
                    className: 'btn-default'
                },
                success: {
                    label: type,
                    className: buttonAppLayout + ' bootbox-submit',
                    callback: function() {
                        $button_submit.prepend('<i class="fas fa-circle-notch fa-spin"></i>');
                        $button_submit.prop('disabled', true);
                        $form_filled = $bootbox.find('form');

                        $.ajax({
                            type: "POST",
                            url: currentURL + '/ajaxSaveData',
                            data: $form_filled.serialize() + '&method=' + type.toLowerCase(),
                            dataType: "json",
                            success: function(response) {
                                if (response.status) {
                                    if (response.status) {
                                        showAlert('success',response.message + ' di' + type.toLowerCase());
                                    } else {
                                        showAlert('error',response.message);
                                    }
                                    $bootbox.modal('hide');
                                    $('.btn-refresh').click();
                                } else {
                                    for (let i = 0; i < response.error_input.length; i++) {
                                        $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                        $('[name="' + response.error_input[i] + '"]').next('.help-block').text(response.error_string[i]);
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