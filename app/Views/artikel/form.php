<style>
    .img-choose {
        /* max-width: 120px; */
        text-align: center;
        margin: auto;
    }

    .img-choose .img-choose-container {
        display: inline-block;
        position: relative;
    }

    .img-choose .btn-remove-img {
        position: absolute;
        padding: 5px 6px 5px 10px;
        top: 0;
        right: 0;
        cursor: pointer;
    }

    .img-choose img {
        width: 100%;
    }

    .upload-file-thumb {
        margin-top: 10px;
        border-top: 1px solid #dee1e5;
        border-bottom: 1px solid #dee1e5;
        background: #f1f2f3;
        padding: 15px;
        display: none;
    }

    .upload-file-thumb img {
        display: block;
        width: auto;
        max-width: 200px;
        margin-bottom: 10px;
        margin-left: auto;
        margin-right: auto;
    }

    .upload-file-thumb .btn-remove-thumb {
        position: absolute;
        padding: 5px 6px 5px 10px;
        top: 10px;
        right: 15px;
        cursor: pointer;
    }

    .modal-body {
        height: 70vh;
        overflow-y: auto;
    }
</style>
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
            <form id="form-artikel" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= @$artikel['artikel_id']; ?>">
                <input type="hidden" name="method" value="<?= @$artikel['artikel_id'] ? 'ubah' : 'simpan'; ?>">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="judul_artikel">Judul *</label>
                            <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" value="<?= @$artikel['judul_artikel']; ?>">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label for="isi_artikel">Isi Artikel</label>
                            <textarea name="isi_artikel" id="isi_artikel"><?= @$artikel['isi_artikel']; ?></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label for="meta_deskripsi">Meta Deskripsi</label>
                            <textarea name="meta_deskripsi" id="meta_deskripsi" class="form-control"><?= @$artikel['meta_deskripsi']; ?></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" id="meta_keyword" class="form-control"><?= @$artikel['meta_keyword']; ?></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="artikel_category_id">Kategori</label>
                            <?php
                            $option_category[NULL] = 'Pilih Kategori';
                            foreach ($category as $key => $val) {
                                $option_category[$val['artikel_category_id']] = $val['nama_kategori'];
                            }
                            echo form_dropdown(
                                ['name' => 'artikel_category_id', 'id' => 'artikel_category_id', 'class' => 'form-control'],
                                $option_category,
                                @$artikel['artikel_category_id']
                            );
                            ?>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <?php
                            $image = @$_FILES['file']['name'] ? @$artikel['image'] : 'no_image.png';
                            if (!empty($image) && file_exists(ROOTPATH . 'public/images/artikel/' . $image)) {
                                echo '<div class="img-choose" style="margin:inherit;margin-bottom:10px">
                                <div class="img-choose-container">
                                    <img src="' . base_url('/public/images/artikel/') . $image . '?r=' . time() . '"/>
                                    <a href="javascript:void(0)" class="btn-remove-img btn btn-danger"><i class="fas fa-times"></i></a>
                                </div>
                            </div>';
                            } else {
                                echo '<div class="img-choose" style="margin:inherit;margin-bottom:10px"></div>';
                            }
                            ?>
                            <input type="hidden" class="image-remove" name="image_remove" value="0">
                            <div class="upload-file-thumb mb-3"><span class="file-prop"></span></div>
                            <input type="file" class="file form-control mb-3" name="image" id="image">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <?= form_dropdown(
                                ['name' => 'status', 'id' => 'status', 'class' => 'form-control'],
                                ['published' => 'Published', 'draft' => 'Draft'],
                                @$artikel['status']
                            ) ?>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label for="artikel_tag_id">Tag</label>
                            <?php
                            foreach ($tag as $key => $val) {
                                $option_role[$val['artikel_tag_id']] = $val['nama_tag'];
                            }

                            if (!empty($artikel['tag'])) {
                                foreach ($artikel['tag'] as $val) {
                                    $artikel_tag_id_selected[] = $val['artikel_tag_id'];
                                }
                            }
                            ?>

                            <?= form_dropdown(
                                ['name' => 'artikel_tag_id[]', 'id' => 'artikel_tag_id', 'multiple' => 'multiple', 'class' => 'form-control select2'],
                                $option_role,
                                @$artikel_tag_id_selected
                            ) ?>
                            <span class="help-block"></span>
                        </div>

                        <button type="submit" class="btn btn-primary"><?= @$artikel['artikel_id'] ? 'Ubah' : 'Simpan'; ?></button>
                        <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?= base_url('public/dist/js/') . 'image-upload.js?r=' . time(); ?>"></script>

<script>
    $(function() {
        // CKEDITOR.replace('isi_artikel');
        $('#isi_artikel').summernote();

        $('form#form-artikel input,select,textarea').on('change', function() {
            $(this).parent('.form-group').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('.select2').select2();

        $('#form-artikel').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const type = $('[name="method"]').val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/artikel/ajaxSaveData'); ?>",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        showAlert('success', response.message);
                        setTimeout(function() {
                            window.location.href = moduleURL;
                        }, 1000);
                    } else {
                        if (response.error_input) {
                            for (let i = 0; i < response.error_input.length; i++) {
                                $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                $('[name="' + response.error_input[i] + '"]').next('.help-block').text(response.error_string[i]);
                            }
                        } else {
                            showAlert('error', response.message);

                        }

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                }
            });
        });
    });
</script>