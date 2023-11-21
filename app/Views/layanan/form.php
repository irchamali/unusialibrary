<form class="form-horizontal" id="form-link-terkait" method="post">
    <div class="form-group">
        <label for="nama_layanan" class="col-sm-3 control-label">Nama Terkait *</label>
        <div class="col-sm-9">
            <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" value="<?= @$layanan['nama_layanan']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="url" class="col-sm-3 control-label">URL *</label>
        <div class="col-sm-9">
            <input type="text" name="url" id="url" class="form-control" value="<?= @$layanan['url']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="use_icon" class="col-sm-3 control-label">Icon</label>
        <div class="col-sm-9">
            <div class="input-group" style="width: 50%;">
                <?php
                $selected_icon = @$layanan['icon'] ? 1 : 0;
                $option_icon = array(1 => 'Ya', 0 => 'Tidak');
                $display = $selected_icon ? '' : 'display:none;';
                echo form_dropdown(['name' => 'use_icon', 'id' => 'use_icon', 'class' => 'form-control'], $option_icon, $selected_icon);
                $icon = @$layanan['icon'] ? $layanan['icon'] : 'fas fa-book-open';
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
        <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="keterangan" id="keterangan"><?= @$layanan['keterangan']; ?></textarea>
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$layanan['id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-link-terkait input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });
    });
</script>