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
                    <button type="button" class="btn btn-sm btn-primary btn-add"><i class="fa fa-plus"></i> Tambah Data</button>
                    <button type="button" class="btn btn-sm btn-default btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </div>
                <div class="form-group col-sm-4 text-center">
                    <!--  -->
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import"><i class="fa fa-file-import"></i> Import Data</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive px-3 pb-3" style="border: 0">
            <table id="table-result" class="w-100 table table-striped table-bordered table-hover"></table>
        </div>
    </div>


    <div class="modal fade" id="modal-import" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-import-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Import Jurnal</h4>
                </div>
                <form class="form-horizontal" id="form-jurnal-import" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fakultas_id" class="col-sm-12 control-label">Silahkan pilih fakultas untuk mendapatkan Contoh Format Jurnal</label>
                            <div class="col-sm-12">
                                <?php
                                $option_fakultas[null] = 'Pilih Fakultas';
                                foreach ($fakultas as $key => $value) {
                                    $option_fakultas[$value['fakultas_id']] = $value['nama_fakultas'];
                                }
                                echo form_dropdown(
                                    ['name' => 'fakultas_id', 'id' => 'fakultas_id', 'class' => 'form-control select2'],
                                    $option_fakultas
                                );
                                ?>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file_excel" class="col-sm-3 control-label">Upload File</label>
                            <div class="col-sm-9">
                                <input type="file" name="file_excel" id="file_excel" class="form-control">
                                <span class="help-block">Ekstensi file harus .xlsx</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-import-close" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-import">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.select2').select2();

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
                [2, "asc"]
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
                    title: 'Fakultas',
                    render: function(response, row, type, meta) {
                        return response.nama_fakultas;
                    }
                },
                {
                    mData: null,
                    title: 'Nama Jurnal',
                    render: function(response, row, type, meta) {
                        return response.nama_jurnal;
                    }
                },
                {
                    mData: null,
                    title: 'Kategori',
                    render: function(response, row, type, meta) {
                        return response.kategori.charAt(0).toUpperCase() + response.kategori.slice(1);
                    }
                },
                {
                    mData: null,
                    title: 'Link',
                    render: function(response, row, type, meta) {
                        result = '<a href="' + response.link + '" target="_blank">' + response.link + '</a>';
                        return result;
                    }
                },
                {
                    mData: null,
                    title: 'Aksi',
                    sortable: false,
                    class: 'text-center',
                    render: function(response, row, type, meta) {
                        let button = '';
                        button += '<button type="button" class="btn btn-primary btn-sm btn-edit mr-2" data-id="' + response.jurnal_id + '"><i class="fa fa-pen"></i> Ubah</button>';
                        button += '<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="' + response.jurnal_id + '" data-message-delete="Apakah anda yakin, Data : <b>' + response.nama_jurnal + '</b> akan dihapus?"><i class="fa fa-trash-alt"></i> Hapus</button>';
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
                title: type == 'Ubah' ? 'Ubah Jurnal' : 'Tambah Jurnal',
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
                                    if (response.status) {
                                        if (response.status) {
                                            showAlert('success', response.message + ' di' + type.toLowerCase());
                                        } else {
                                            showAlert('error', response.message);
                                        }
                                        $bootbox.modal('hide');
                                        $('.btn-refresh').click();
                                    } else {
                                        for (let i = 0; i < response.error_input.length; i++) {
                                            $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                            $('[name="' + response.error_input[i] + '"]').next().text(response.error_string[i]);
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

        $('#modal-import').on('hidden.bs.modal', function(e) {
            $('[name="file_excel"]').val('');
            $('[name="file_excel"]').parent('.col-sm-9').removeClass('has-error');
            $('[name="file_excel"]').next('.help-block').text('Ekstensi file harus .xlsx');
        });

        $('form#form-jurnal-import input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('Ekstensi file harus .xlsx');
        });

        $('#fakultas_id').on('change', function() {
            window.open('<?= base_url('admin/jurnal/exportData?id='); ?>' + $(this).val(), '_blank');
        });

        $('#form-jurnal-import').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/jurnal/ajaxSaveImportData'); ?>",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(response) {
                    $('#modal-import').modal('hide');

                    if (response.status == true) {
                        showAlert('success', response.message);
                    }

                    $('.btn-refresh').click();

                    if (response.status == false) {
                        if (response.error) {
                            $('[name="file_excel"]').parent().addClass('has-error');
                            $('[name="file_excel"]').next('.help-block').text(response.error);
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                }
            });
        });
    });
</script>