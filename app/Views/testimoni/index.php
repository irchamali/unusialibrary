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
                    <a href="<?= base_url('admin/testimoni/form'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
            <table id="table-result" class="w-100 table table-striped table-bordered table-hover"></table>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('body').delegate('form', 'submit', function(e) {
            e.preventDefault();
            return false;
        });

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
                    title: 'Image',
                    render: function(response, row, type, meta) {
                        return response.image ? '<img src="<?= base_url('public/images/testimoni/') ?>' + response.image + '" class="btn-user-image" style="width:80px;height:80px;">' : '<img src="<?= base_url('public/images/no_image.png') ?>" class="btn-user-image" style="width:80px;height:80px;">';
                    }
                },
                {
                    mData: null,
                    title: 'Nama Lengkap',
                    render: function(response, row, type, meta) {
                        return response.nama;
                    }
                },
                {
                    mData: null,
                    title: 'Title / Jabatan',
                    render: function(response, row, type, meta) {
                        return response.title;
                    }
                },
                {
                    mData: null,
                    title: 'Deskripsi',
                    render: function(response, row, type, meta) {
                        return response.deskripsi;
                    }
                },
                {
                    mData: null,
                    title: 'Aksi',
                    sortable: false,
                    class: 'text-center',
                    render: function(response, row, type, meta) {
                        let button = '';
                        let url = '<?= base_url('admin/testimoni/form?id=') ?>' + response.id;
                        button += '<a href="' + url + '" class="btn btn-primary btn-sm mr-2""><i class="fa fa-pen"></i> Ubah</a>';
                        button += '<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="' + response.id + '" data-message-delete="Apakah anda yakin, Data tag : <b>' + response.nama + '</b> akan dihapus?"><i class="fa fa-trash-alt"></i> Hapus</button>';
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
    });
</script>