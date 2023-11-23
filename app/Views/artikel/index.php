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
            <div class="row">
                <div class="col-sm-4">
                    <a href="<?= base_url('admin/artikel/form'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    <button type="button" class="btn btn-sm btn-default btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </div>
                <div class="form-group col-sm-4 text-center">
                    <!--  -->
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive px-3 pb-3" style="border: 0">
            <?php
            $th = '';
            $column = [
                'ignore_image' => 'Gambar',
                'judul_artikel' => 'Judul',
                'created_at' => 'Tanggal Publish',
                'nama_kategori' => 'Kategori',
                'nama_tag' => 'Tag',
                'status' => 'Status',
                'ignore_btn' => 'Aksi'
            ];
            $settings['order'] = [1, 'asc'];
            $index = 0;
            foreach ($column as $key => $val) {
                $th .= '<th>' . $val . '</th>';
                $column_dt[] = ['data' => $key];
                if (strpos($key, 'ignore') !== false) {
                    $settings['columnDefs'][] = ["targets" => $index, "orderable" => false];
                }
                $index++;
            }
            ?>
            <table id="table-result" class="w-100 table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <?= $th ?>
                    </tr>
                </thead>
            </table>
            <span id="dataTables-column" style="display:none"><?= json_encode($column_dt) ?></span>
            <span id="dataTables-setting" style="display:none"><?= json_encode($settings) ?></span>
        </div>
    </div>
</section>

<script>
    $(function() {

        $(document).ready(function() {
            $('.modal-body').css({
                "height": "70vh",
                "overflow-y": "auto"
            });

            if ($('#table-result').length) {
                dataTables_column = $.parseJSON($('#dataTables-column').html());
                dataTables_setting = $('#dataTables-setting');

                var settings = {
                    "processing": true,
                    "serverSide": true,
                    "scrollX": true,
                    "ajax": {
                        "url": moduleURL + '/ajaxGetData',
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
                                        showAlert('success', response.message);
                                    } else {
                                        showAlert('error', response.message);
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

        // $('#table-result').delegate('.change-status', 'click', function(e) {
        //     e.preventDefault();
        //     id = $(this).attr('data-id');
        //     type = $(this).attr('data-type');
        //     $.ajax({
        //         type: "POST",
        //         url: currentURL + '/ajaxChangeStatus',
        //         data: "id=" + id + "&type=" + type,
        //         dataType: "json",
        //         success: function(response) {
        //             if (response.status) {
        //                 $('.btn-refresh').click();
        //             }
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             alert(jqXHR.responseText);
        //         }
        //     });
        // });
    });
</script>