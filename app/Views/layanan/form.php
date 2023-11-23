<form id="form-layanan" method="post">
    <div class="form-group">
        <label for="use_icon">Icon</label>
        <div class="input-group" style="width: 40%;">
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

    <div class="form-group">
        <label for="nama_layanan">Nama Layanan *</label>
        <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" value="<?= @$layanan['nama_layanan']; ?>">
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="keterangan"><?= @$layanan['keterangan']; ?></textarea>
        <span class="help-block"></span>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$layanan['layanan_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-layanan input').on('change', function() {
            $(this).parent('.form-group').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('#keterangan').summernote();
    });
</script>