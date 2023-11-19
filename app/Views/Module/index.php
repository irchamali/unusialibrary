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
                    <button type="button" class="btn btn-sm <?= $settingLayout['button']; ?> btn-add"><i class="fa fa-plus"></i> Tambah Data</button>
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