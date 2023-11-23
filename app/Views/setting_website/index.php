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
            <form action="<?= base_url('admin/setting_website/save'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_website" class="col-sm-2 control-label">Nama/Judul Website</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_website" id="nama_website" class="form-control" value="<?= @$setting['nama_website']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="meta_deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_deskripsi" id="meta_deskripsi" class="form-control" value="<?= @$setting['meta_deskripsi']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="meta_keyword" class="col-sm-2 control-label">Keyword</label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="<?= @$setting['meta_keyword']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="logo_profile" class="col-sm-2 control-label">Logo Profile</label>
                    <div class="col-sm-10">
                        <input type="file" name="logo_profile" id="logo_profile" class="form-control" value="<?= @$setting['logo_profile']; ?>">
                        <span class="help-block">
                            <img src="<?= base_url('public/images/') . @$setting['logo_profile'];  ?>" class="thumbnail">
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="logo_favicon" class="col-sm-2 control-label">Logo Favicon</label>
                    <div class="col-sm-10">
                        <input type="file" name="logo_favicon" id="logo_favicon" class="form-control" value="<?= @$setting['logo_favicon']; ?>">
                        <span class="help-block">
                            <img src="<?= base_url('public/images/') . @$setting['logo_favicon'];  ?>" class="thumbnail">
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="logo_header" class="col-sm-2 control-label">Logo Header</label>
                    <div class="col-sm-10">
                        <input type="file" name="logo_header" id="logo_header" class="form-control" value="<?= @$setting['logo_header']; ?>">
                        <span class="help-block">
                            <img src="<?= base_url('public/images/') . @$setting['logo_header'];  ?>" class="thumbnail">
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="logo_footer" class="col-sm-2 control-label">Logo Footer</label>
                    <div class="col-sm-10">
                        <input type="file" name="logo_footer" id="logo_footer" class="form-control" value="<?= @$setting['logo_footer']; ?>">
                        <span class="help-block">
                            <img src="<?= base_url('public/images/') . @$setting['logo_footer'];  ?>" class="thumbnail">
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="alamat" id="alamat"><?= @$setting['alamat']; ?></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_telp" class="col-sm-2 control-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= @$setting['no_telp']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email Resmi</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" id="email" class="form-control" value="<?= @$setting['email']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="facebook" class="col-sm-2 control-label">Facebook</label>
                    <div class="col-sm-10">
                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?= @$setting['facebook']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="instagram" class="col-sm-2 control-label">Instagram</label>
                    <div class="col-sm-10">
                        <input type="text" name="instagram" id="instagram" class="form-control" value="<?= @$setting['instagram']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="whatsapp" class="col-sm-2 control-label">WhatsApp</label>
                    <div class="col-sm-10">
                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="<?= @$setting['whatsapp']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="google_maps" class="col-sm-2 control-label">Google Maps</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="google_maps" id="google_maps"><?= @$setting['google_maps']; ?></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="play_store" class="col-sm-2 control-label">Play Store</label>
                    <div class="col-sm-10">
                        <input type="text" name="play_store" id="play_store" class="form-control" value="<?= @$setting['play_store']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="apple_store" class="col-sm-2 control-label">Apple Store</label>
                    <div class="col-sm-10">
                        <input type="text" name="apple_store" id="apple_store" class="form-control" value="<?= @$setting['apple_store']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="footer" class="col-sm-2 control-label">Footer</label>
                    <div class="col-sm-10">
                        <textarea name="footer" id="footer" class="form-control"><?= @$setting['footer']; ?></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-website">Simpan</button>
            </form>
        </div>
    </div>
</section>

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