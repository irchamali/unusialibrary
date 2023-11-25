<form class="form-horizontal" id="form-module" method="post">
    <div class="form-group">
        <label for="module" class="col-sm-3 control-label">Nama Module *</label>
        <div class="col-sm-9">
            <input type="text" name="module" id="module" class="form-control" value="<?= @$module['module']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="module_url" class="col-sm-3 control-label">URL *</label>
        <div class="col-sm-9">
            <input type="text" name="module_url" id="module_url" class="form-control" value="<?= @$module['module_url']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="module_type" class="col-sm-3 control-label">Module Type</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'module_type', 'id' => 'module_type', 'class' => 'form-control'],
                ['Backend' => 'Backend', 'Frontend' => 'Frontend'],
                @$module['module_type']
            ) ?>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="is_login" class="col-sm-3 control-label">Login?</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'is_login', 'id' => 'is_login', 'class' => 'form-control'],
                ['Y' => 'Ya', 'N' => 'Tidak', 'R' => 'Restrict'],
                @$module['is_login']
            ) ?>
        </div>
        <span class="help-block col-sm-12 small">Apakah untuk mengakses module perlu login? <br> <b>Restrict</b> berarti untuk mengakses module, posisi tidak boleh login, jika posisi sedang login, module tidak bisa diakses (halaman akan diarahkan ke default module), contoh module login dan register.</span>
    </div>

    <div class="form-group">
        <label for="module_status_id" class="col-sm-3 control-label">Status</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'module_status_id', 'id' => 'module_status_id', 'class' => 'form-control'],
                ['1' => 'Aktif', '2' => 'Tidak Aktif', '3' => 'Dalam Pengembangan'],
                @$module['module_status_id']
            ) ?>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="role_id" class="col-sm-3 control-label">Role</label>
        <div class="col-sm-9">
            <?php
            foreach ($role as $key => $val) {
                $option_role[$val['role_id']] = $val['nama_role'];
            }

            if (!empty($module['role'])) {
                foreach ($module['role'] as $val) {
                    $role_id_selected[] = $val['role_id'];
                }
            }
            ?>

            <?= form_dropdown(
                ['name' => 'role_id[]', 'id' => 'role_id', 'multiple' => 'multiple', 'class' => 'form-control select2'],
                $option_role,
                @$role_id_selected
            ) ?>
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$module['module_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-module input').on('change', function() {
            $(this).parent('.form-group').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('.select2').select2();
    });
</script>