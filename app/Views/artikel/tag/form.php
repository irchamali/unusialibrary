<form class="form-horizontal" id="form-tag" method="post">
    <div class="form-group">
        <label for="nama_tag" class="col-sm-3 control-label">Nama Tag *</label>
        <div class="col-sm-9">
            <input type="text" name="nama_tag" id="nama_tag" class="form-control" value="<?= @$tag['nama_tag']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$tag['artikel_tag_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-tag input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });
    });
</script>