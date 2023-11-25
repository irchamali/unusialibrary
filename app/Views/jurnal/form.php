<form class="form-horizontal" id="form-jurnal" method="post">
    <div class="form-group">
        <label for="fakultas_id" class="col-sm-3 control-label">Fakultas</label>
        <div class="col-sm-9">
            <?php
            foreach ($fakultas as $key => $value) {
                $option_fakultas[$value['fakultas_id']] = $value['nama_fakultas'];
            }
            echo form_dropdown(
                ['name' => 'fakultas_id', 'id' => 'fakultas_id', 'class' => 'form-control select2'],
                $option_fakultas,
                @$jurnal['fakultas_id']
            );
            ?>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="nama_jurnal" class="col-sm-3 control-label">Nama Jurnal *</label>
        <div class="col-sm-9">
            <input type="text" name="nama_jurnal" id="nama_jurnal" class="form-control" value="<?= @$jurnal['nama_jurnal']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="kategori" class="col-sm-3 control-label">Kategori</label>
        <div class="col-sm-9">
            <?= form_dropdown(
                ['name' => 'kategori', 'id' => 'kategori', 'class' => 'form-control'],
                ['nasional' => 'Nasional', 'internasional' => 'Internasional'],
                @$jurnal['kategori']
            ) ?>
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="link" class="col-sm-3 control-label">Link *</label>
        <div class="col-sm-9">
            <input type="text" name="link" id="link" class="form-control" value="<?= @$jurnal['link']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$jurnal['jurnal_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-jurnal input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('.select2').select2();
    });
</script>