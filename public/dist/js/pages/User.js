
$(document).ready(function () {
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
});