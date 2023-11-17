<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $title; ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button> -->
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-sm <?= $settingAppLayout['button']; ?> btn-add"><i class="fa fa-plus"></i> Tambah Data</button>
                    <button type="button" class="btn btn-sm btn-default btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </div>
                <div class="form-group col-sm-4 text-center">
                    <select id="filter_module" class="form-control select2" style="width:100% !important">
                        <option value="">Semua Module</option>
                        <?php foreach ($module as $val) : ?>
                            <option value="<?= $val['module_id']; ?>"><?= $val['module']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        Kanan
                        <!-- <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Hapus</button> -->
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
    $(function() {
        $('.select2').select2();

        $('#filter_module').on('change', function() {
            let id_module = $(this).val();
            let src = currentURL + '/ajaxGetData';
            let url;

            if (id_module !== '') {
                let src2 = src + '/' + id_module;
                url = $(this).prop('checked') === true ? src : src2;
            } else {
                url = src;
            }
            dataTables.ajax.url(url).load();
        });
    });
</script>