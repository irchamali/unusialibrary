<form class="form-horizontal" id="form-role" method="post">
    <div class="form-group">
        <label for="nama_role" class="col-sm-3 control-label">Nama Role *</label>
        <div class="col-sm-9">
            <input type="text" name="nama_role" id="nama_role" class="form-control" value="<?= @$role['nama_role']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="keterangan" id="keterangan"><?= @$role['keterangan']; ?></textarea>
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$role['role_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-role input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });
    });
</script>