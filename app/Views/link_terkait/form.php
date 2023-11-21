<form class="form-horizontal" id="form-link-terkait" method="post">
    <div class="form-group">
        <label for="nama_terkait" class="col-sm-3 control-label">Nama Terkait *</label>
        <div class="col-sm-9">
            <input type="text" name="nama_terkait" id="nama_terkait" class="form-control" value="<?= @$link_terkait['nama_terkait']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="url" class="col-sm-3 control-label">URL *</label>
        <div class="col-sm-9">
            <input type="text" name="url" id="url" class="form-control" value="<?= @$link_terkait['url']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="target" class="col-sm-3 control-label">Target Blank?</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'target', 'id' => 'target', 'class' => 'form-control'],
                ['' => 'Tidak', '_blank' => 'Ya'],
                @$link_terkait['target']
            ) ?>
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$link_terkait['id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-link-terkait input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });
    });
</script>