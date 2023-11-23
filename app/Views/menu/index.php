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
            <div class="row mb-3">
                <div class="col-md-4 kategori-container">
                    <button type="button" class="btn btn-sm btn-primary btn-add-menu-kategori mb-3"><i class="fa fa-plus"></i> Tambah Menu Kategori</button>

                    <div id="list-kategori">
                        <ul class="list-group menu-kategori-container" id="list-kategori-container">
                            <?php foreach ($menu_kategori as $key => $value) {
                                if ($value['menu_kategori_id'] == '')
                                    continue;
                                $active = $key == 0 ? 'list-group-item-primary active' : '';
                            ?>

                                <li data-id-kategori="<?= $value['menu_kategori_id']; ?>" class="kategori-item list-group-item list-group-item-action <?= $active; ?>">
                                    <span class="text"><?= $value['nama_kategori']; ?></span>
                                    <ul class="toolbox">
                                        <li class="">
                                            <a class="btn-action text-success btn-edit" href="javascript:void(0)"><i class="fas fa-pencil-alt"></i></a>
                                        </li>
                                        <li class="">
                                            <a class="btn-action text-danger btn-delete" href="javascript:void(0)"><i class="fas fa-trash-alt"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <li class="list-group-item list-group-item-action disabled">
                                <span class="text">Uncategorized</span>
                            </li>
                        </ul>
                        <li data-id-kategori="" class="kategori-item list-group-item list-group-item-action" id="kategori-item-template" style="display:none">
                            <span class="text"></span>
                            <ul class="toolbox">
                                <li>
                                    <a class="btn-action text-success btn-edit" href="javascript:void(0)"><i class="fas fa-pencil-alt"></i></a>
                                </li>
                                <li>
                                    <a class="btn-action text-danger btn-delete" href="javascript:void(0)"><i class="fas fa-trash-alt"></i></a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>

                <div class="col-md-8">
                    <button type="button" class="btn btn-sm btn-primary btn-add-menu mb-3"><i class="fa fa-plus"></i> Tambah Menu</button>
                    <div class="dd" id="list-menu">
                        <?= $list_menu ?: '<div class="alert alert-danger">Data menu tidak ditemukan</div>' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

</script>