<form class="form-horizontal" id="form-category" method="post">
    <div class="form-group">
        <label for="nama_kategori" class="col-sm-3 control-label">Nama Kategori *</label>
        <div class="col-sm-9">
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= @$category['nama_kategori']; ?>">
            <span class="help-block"></span>
        </div>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$category['artikel_category_id']; ?>">
</form>

<script>
    $(function() {
        $('form#form-category input').on('change', function() {
            $(this).parent('.col-sm-9').removeClass('has-error');
            $(this).next('.help-block').text('');
        });
    });
</script>