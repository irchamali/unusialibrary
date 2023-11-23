<form class="form-horizontal" id="form-menu" method="post">
    <div class="form-group">
        <label for="menu_kategori_id" class="col-sm-3 control-label">Menu Kategori</label>
        <div class="col-sm-9">
            <?php
            $option_menu_kategori = [];
            foreach ($menu_kategori as $valMenuKategori) {
                $option_menu_kategori[$valMenuKategori['menu_kategori_id']] = $valMenuKategori['nama_kategori'];
            }

            if (!@$menu['menu_kategori_id']) {
                $menu['menu_kategori_id'] = 'null';
            }
            echo form_dropdown(
                ['name' => 'menu_kategori_id', 'id' => 'menu_kategori_id', 'class' => 'form-control'],
                $option_menu_kategori,
                @$menu['menu_kategori_id']
            );
            ?>
            <span class="help-block"></span>
        </div>
    </div>

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
        <label for="use_icon" class="col-sm-3 control-label">Icon</label>
        <div class="col-sm-9">
            <div class="input-group" style="width: 50%;">
                <?php
                $selected_icon = @$menu['icon'] ? 1 : 0;
                $option_icon = array(1 => 'Ya', 0 => 'Tidak');
                $display = $selected_icon ? '' : 'display:none;';
                echo form_dropdown(['name' => 'use_icon', 'id' => 'use_icon', 'class' => 'form-control'], $option_icon, $selected_icon);
                $icon = @$menu['icon'] ? $menu['icon'] : 'far fa-circle';
                ?>
                <span class="input-group-addon" style="cursor: pointer; <?= $display; ?>">
                    <span class="icon-preview" data-action="faPicker">
                        <i class="<?= $icon; ?>"></i>
                    </span>
                </span>
                <input type="hidden" name="icon_class" value="<?= $icon; ?>" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="is_active" class="col-sm-3 control-label">Status</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'is_active', 'id' => 'is_active', 'class' => 'form-control'],
                ['1' => 'Aktif', '0' => 'Tidak Aktif'],
                @$menu_kategori['is_active']
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

    <div class="form-group">
        <label for="role_id" class="col-sm-3 control-label">Role *</label>
        <div class="col-sm-9">
            <?php
            $option_role = [];
            foreach ($role_menu as $val) {
                $option_role[$val['role_id']] = $val['nama_role'];
            }
            $selected_role = [];
            if (!empty($menu['role_id'])) {
                $selected_role = explode(',', $menu['role_id']);
            }

            echo form_dropdown(
                ['name' => 'role_id[]', 'id' => 'role_id', 'multiple' => 'multiple', 'class' => 'form-control select2'],
                $option_role,
                @$selected_role
            ); ?>

            <span class="help-block"></span>
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