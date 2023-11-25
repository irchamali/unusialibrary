<form class="form-horizontal" id="form-menu" method="post">
    <div class="form-group">
        <label for="nama_menu" class="col-sm-3 control-label">Nama Menu *</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" value="<?= @$menu['nama_menu']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="url" class="col-sm-3 control-label">URL *</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="url" id="url" placeholder="URL Menu" value="<?= @$menu['url']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="is_active" class="col-sm-3 control-label">Status</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'is_active', 'id' => 'is_active', 'class' => 'form-control'],
                ['1' => 'Aktif', '0' => 'Tidak Aktif'],
                @$menu['is_active']
            ) ?>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="module_id" class="col-sm-3 control-label">Module</label>
        <div class="col-sm-9">
            <?php
            $option_module[0] = 'Tidak ada module';
            foreach ($module_menu as $key => $valModule) {
                $option_module[$valModule['module_id']] = $valModule['module'] . ' - ' . $valModule['nama_module'] . ' (' . $valModule['module_status']  . ')';
            }
            echo form_dropdown(
                ['name' => 'module_id', 'id' => 'module_id', 'class' => 'form-control select2'],
                $option_module,
                @$menu['module_id']
            );
            ?>
            <span class="help-block">Untuk highlight menu dan parent</span>
        </div>
    </div>

    <input type="hidden" name="id" value="<?= @$menu['menu_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-menu input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('.select2').select2({
            // theme: 'bootstrap-5',
            // dropdownParent: $(".bootbox")
        });
    });
</script>