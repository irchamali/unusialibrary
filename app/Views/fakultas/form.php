<form class="form-horizontal" id="form-fakultas" method="post">
    <div class="form-group">
        <label for="nama_fakultas" class="col-sm-3 control-label">Nama Fakultas *</label>
        <div class="col-sm-9">
            <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" value="<?= @$fakultas['nama_fakultas']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$fakultas['fakultas_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-fakultas input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });
    });
</script>