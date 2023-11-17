<form class="form-horizontal" id="form-menu-kategori" method="post">
    <div class="form-group">
        <label for="nama_kategori" class="col-sm-3 control-label">Menu Kategori *</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Menu Kategori" value="<?= @$menu_kategori['nama_kategori']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="keterangan" id="keterangan"><?= @$menu_kategori['keterangan']; ?></textarea>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="is_active" class="col-sm-3 control-label">Status</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'is_active', 'id' => 'is_active', 'class' => 'form-control'],
                ['1' => 'Aktif', '2' => 'Tidak Aktif'],
                @$menu_kategori['is_active']
            ) ?>
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" value="<?= @$menu_kategori['menu_kategori_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-menu-kategori input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });
    });
</script>