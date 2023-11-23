<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $title; ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            <form action="<?= base_url('admin/setting-about/save'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="sejarah" class="col-sm-2 control-label">Sejarah</label>
                    <div class="col-sm-10">
                        <textarea name="sejarah" id="sejarah"><?= @$setting['sejarah']; ?></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="visi_misi" class="col-sm-2 control-label">Visi Misi</label>
                    <div class="col-sm-10">
                        <textarea name="visi_misi" id="visi_misi"><?= @$setting['visi_misi']; ?></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="struktur_organisasi" class="col-sm-2 control-label">Struktur Organisasi</label>
                    <div class="col-sm-10">
                        <input type="file" name="struktur_organisasi" id="struktur_organisasi" class="form-control" value="<?= @$setting['struktur_organisasi']; ?>">
                        <span class="help-block">
                            <img src="<?= base_url('public/images/') . @$setting['struktur_organisasi'];  ?>" class="thumbnail" style="width:100%">
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fasilitas" class="col-sm-2 control-label">Fasilitas</label>
                    <div class="col-sm-10">
                        <textarea name="fasilitas" id="fasilitas"><?= @$setting['fasilitas']; ?></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-about">Simpan</button>
            </form>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        CKEDITOR.replace('sejarah');
        CKEDITOR.replace('visi_misi');
        CKEDITOR.replace('fasilitas');
    });
</script>

<?php if (session()->getFlashdata('message') == 'success') { ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Good Job!',
                text: 'Data berhasil disimpan',
                icon: 'success'
            });
        });
    </script>
<?php } ?>

<?php if (session()->getFlashdata('message') == 'error') { ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Oops...',
                text: 'Invalid input',
                icon: 'error'
            });
        });
    </script>
<?php } ?>