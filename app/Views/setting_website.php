<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="pull-left header"><?= $title; ?></li>
            <li class="active"><a href="#tab_profile" data-toggle="tab" aria-expanded="false">Profile Perpustakaan</a></li>
            <li class=""><a href="#tab_website" data-toggle="tab" aria-expanded="true">Website</a></li>
            <li class=""><a href="#tab_contact-us" data-toggle="tab" aria-expanded="false">Kontak Kami</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_profile">
                <form class="form-horizontal" id="form-profile" method="post">
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
                            <input type="text" name="struktur_organisasi" id="struktur_organisasi" class="form-control" value="<?= @$setting['struktur_organisasi']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">Website Resmi</label>
                        <div class="col-sm-10">
                            <input type="text" name="url" id="url" class="form-control" value="<?= @$setting['url']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div> -->

                    <button type="submit" class="btn btn-primary btn-profile">Simpan</button>
                </form>
            </div>

            <div class="tab-pane" id="tab_website">
                <form class="form-horizontal" id="form-website" method="post">
                    <div class="form-group">
                        <label for="nama_website" class="col-sm-2 control-label">Nama Website</label>
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
                        <label for="image_dark" class="col-sm-2 control-label">Gambar Dark</label>
                        <div class="col-sm-10">
                            <input type="text" name="image_dark" id="image_dark" class="form-control" value="<?= @$setting['image_dark']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image_light" class="col-sm-2 control-label">Gambar Light</label>
                        <div class="col-sm-10">
                            <input type="text" name="image_light" id="image_light" class="form-control" value="<?= @$setting['image_light']; ?>">
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

            <div class="tab-pane" id="tab_contact-us">
                <form class="form-horizontal" id="form-contact-us" method="post">
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
                        <label for="email" class="col-sm-2 control-label">Email</label>
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

                    <button type="submit" class="btn btn-primary btn-contact-us">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var $body = $('body');
        var $button = $('button').prop('disabled', false);

        CKEDITOR.replace('sejarah');
        CKEDITOR.replace('visi_misi');
        CKEDITOR.replace('jam_operasional');

        $("#form-website").on('submit', function(e) {
            e.preventDefault();
            $button.prop('disabled', true);
            $button_submit = $('button.btn-website');
            $spinner = $('<i class="fas fa-circle-notch fa-spin mr-2"></i>');
            $spinner.prependTo($button_submit);

            $.ajax({
                type: "POST",
                url: currentURL + "/ajaxSaveSettingWebsite",
                data: $('#form-website').serialize(),
                dataType: "json",
                success: function(response) {
                    $button.prop('disabled', false);
                    $spinner.remove();
                    if (response.status) {
                        showAlert('success', response.message);
                    } else {
                        showAlert('error', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        });

        $("#form-contact-us").on('submit', function(e) {
            e.preventDefault();
            $button.prop('disabled', true);
            $button_submit = $('button.btn-contact-us');
            $spinner = $('<i class="fas fa-circle-notch fa-spin mr-2"></i>');
            $spinner.prependTo($button_submit);

            $.ajax({
                type: "POST",
                url: currentURL + "/ajaxSaveSettingContactUs",
                data: $('#form-contact-us').serialize(),
                dataType: "json",
                success: function(response) {
                    $button.prop('disabled', false);
                    $spinner.remove();
                    if (response.status) {
                        showAlert('success', response.message);
                    } else {
                        showAlert('error', response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        });
    });
</script>