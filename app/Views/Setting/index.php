<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="pull-left header"><?= $title; ?></li>
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Aplikasi</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Layout</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Library</a></li>
            <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Media Sosial</a></li>
            <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Profile Perpustakaan</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <form class="form-horizontal" id="form-aplikasi" method="post">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="<?= @$settingApp['title']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" value="<?= @$settingApp['description']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" name="keyword" id="keyword" class="form-control" value="<?= @$settingApp['keyword']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="text" name="image" id="image" class="form-control" value="<?= @$settingApp['image']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="shortcut_icon" class="col-sm-2 control-label">Shortcut Icon</label>
                        <div class="col-sm-10">
                            <input type="text" name="shortcut_icon" id="shortcut_icon" class="form-control" value="<?= @$settingApp['shortcut_icon']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="footer" class="col-sm-2 control-label">Footer</label>
                        <div class="col-sm-10">
                            <textarea name="footer" id="footer" class="form-control"><?= @$settingApp['footer']; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <button type="submit" class="btn <?= $settingLayout['button']; ?> btn-aplikasi">Simpan</button>
                </form>
            </div>

            <div class="tab-pane" id="tab_2">
                <form class="form-horizontal" id="form-layout" method="post">
                    <div class="form-group">
                        <label for="font_family" class="col-sm-2 control-label">Font Family</label>
                        <div class="col-sm-10">
                            <?= form_dropdown(['name' => 'font_family', 'id' => 'font_family', 'class' => 'form-control'], ['open-sans' => 'Open Sans (Default)', 'arial' => 'Arial', 'montserrat' => 'Montserrat', 'poppins' => 'Poppins', 'roboto' => 'Roboto', 'verdana' => 'Verdana'], @$settingLayout['font_family']) ?>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="font_size" class="col-sm-2 control-label">Font Size</label>
                        <div class="col-sm-10">
                            <?php
                            $value_font_size = @$settingLayout['font_size'];
                            ?>
                            <input class="range-slider" type="range" step="0.5" name="font_size" id="font-size" value="<?= $value_font_size ?>" min="10" max="18">
                            <?php
                            $left_output = (($value_font_size - 10) * 33);
                            ?>
                            <output for="font-size" style="left:<?= $left_output ?>px"><?= $value_font_size ?></output>px
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="theme" class="col-sm-2 control-label">Theme</label>
                        <div class="col-sm-10"> -->
                    <input type="hidden" name="theme" id="theme" class="form-control" value="<?= @$settingLayout['theme']; ?>">
                    <!-- <span class="help-block"></span>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="button" class="col-sm-2 control-label">Button</label>
                        <div class="col-sm-10"> -->
                    <input type="hidden" name="button" id="button" class="form-control" value="<?= @$settingLayout['button']; ?>">
                    <!-- <span class="help-block"></span>
                        </div>
                    </div> -->

                    <button type="submit" class="btn <?= $settingLayout['button']; ?> btn-layout">Simpan</button>
                </form>
            </div>

            <div class="tab-pane" id="tab_3">
                <form class="form-horizontal" id="form-library" method="post">
                    <div class="form-group">
                        <label for="perpustakaan_digital_unusia" class="col-sm-2 control-label">Perpustakaan Digital Unusia</label>
                        <div class="col-sm-10">
                            <input type="text" name="perpustakaan_digital_unusia" id="perpustakaan_digital_unusia" class="form-control" value="<?= @$settingLibrary['perpustakaan_digital_unusia']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="perpustakaan_univ_nu_indonesia" class="col-sm-2 control-label">Perpustakaan Univ NU Indonesia</label>
                        <div class="col-sm-10">
                            <input type="text" name="perpustakaan_univ_nu_indonesia" id="perpustakaan_univ_nu_indonesia" class="form-control" value="<?= @$settingLibrary['perpustakaan_univ_nu_indonesia']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="perpustakaan_unusia" class="col-sm-2 control-label">Perpustakaan Unusia</label>
                        <div class="col-sm-10">
                            <input type="text" name="perpustakaan_unusia" id="perpustakaan_unusia" class="form-control" value="<?= @$settingLibrary['perpustakaan_unusia']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="peminjaman_buku" class="col-sm-2 control-label">Peminjaman Buku</label>
                        <div class="col-sm-10">
                            <input type="text" name="peminjaman_buku" id="peminjaman_buku" class="form-control" value="<?= @$settingLibrary['peminjaman_buku']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane" id="tab_4">
                <form class="form-horizontal" id="form-media-sosial" method="post">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="<?= @$settingMediaSosial['email']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="facebook" class="col-sm-2 control-label">Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" name="facebook" id="facebook" class="form-control" value="<?= @$settingMediaSosial['facebook']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="instagram" class="col-sm-2 control-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" name="instagram" id="instagram" class="form-control" value="<?= @$settingMediaSosial['instagram']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="whatsapp" class="col-sm-2 control-label">WhatsApp</label>
                        <div class="col-sm-10">
                            <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="<?= @$settingMediaSosial['whatsapp']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane" id="tab_5">
                <form class="form-horizontal" id="form-profile" method="post">
                    <div class="form-group">
                        <label for="sejarah" class="col-sm-2 control-label">Sejarah</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" value=""> -->
                            <textarea name="sejarah" id="sejarah"><?= @$settingProfile['sejarah']; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="visi_misi" class="col-sm-2 control-label">Visi Misi</label>
                        <div class="col-sm-10">
                            <!-- <input type="text"class="form-control" value=""> -->
                            <textarea name="visi_misi" id="visi_misi"><?= @$settingProfile['visi_misi']; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="struktur_organisasi" class="col-sm-2 control-label">Struktur Organisasi</label>
                        <div class="col-sm-10">
                            <input type="text" name="struktur_organisasi" id="struktur_organisasi" class="form-control" value="<?= @$settingProfile['struktur_organisasi']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat" id="alamat" class="form-control" value="<?= @$settingProfile['alamat']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" id="phone" class="form-control" value="<?= @$settingProfile['phone']; ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jam_operasional" class="col-sm-2 control-label">Jam Operasional</label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" value=""> -->
                            <textarea name="jam_operasional" id="jam_operasional"><?= @$settingProfile['jam_operasional']; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <button type="submit" class="btn <?= $settingLayout['button']; ?> btn-profile">Simpan</button>
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

        $('#font_family').on('change', function() {
            url = themeURL + '/css/fonts/' + $(this).val() + '.css';
            $('#font-switch').attr('href', url);
            $('#font_family').val($(this).val());
        });

        $('.range-slider').on('input', function() {
            element = $(this);
            $("body").css('font-size', element.val() + 'px');
            $output = element.next("output");
            box = $output.width() / 2;

            var init = 25;
            var curr = ((element.val() - 10) * 33) - box;
            var top_pos = 22 + element.position().top;

            element.next("output").css({
                left: curr + init,
                top: top_pos
            }).text(element.val());
        });

        $('#font-size').on('change', function() {
            $('body').css('font-size', this.value);
        });

        $("#form-aplikasi").on('submit', function(e) {
            e.preventDefault();
            $button.prop('disabled', true);
            $button_submit = $('button.btn-aplikasi');
            $spinner = $('<i class="fas fa-circle-notch fa-spin mr-2"></i>');
            $spinner.prependTo($button_submit);

            $.ajax({
                type: "POST",
                url: currentURL + "/ajaxSaveSettingApp",
                data: $('#form-aplikasi').serialize(),
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

        $("#form-layout").on('submit', function(e) {
            e.preventDefault();
            $button.prop('disabled', true);
            $button_submit = $('button.btn-layout');
            $spinner = $('<i class="fas fa-circle-notch fa-spin mr-2"></i>');
            $spinner.prependTo($button_submit);

            $.ajax({
                type: "POST",
                url: currentURL + "/ajaxSaveSettingLayout",
                data: $('#form-layout').serialize(),
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

        $("#form-profile").on('submit', function(e) {
            e.preventDefault();
            $button.prop('disabled', true);
            $button_submit = $('button.btn-profile');
            $spinner = $('<i class="fas fa-circle-notch fa-spin mr-2"></i>');
            $spinner.prependTo($button_submit);

            $.ajax({
                type: "POST",
                url: currentURL + "/ajaxSaveSettingProfile",
                data: $('#form-profile').serialize(),
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