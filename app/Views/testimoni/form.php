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
            <form id="form-testimoni" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Gambar</label>
                    <div class="col-sm-10 col-md-4">
                        <?php
                        $image = @$_FILES['file']['name'] ?: @$testimoni['image'];
                        if (!empty($image) && file_exists(ROOTPATH . 'public/images/testimoni/' . $image)) {
                            echo '<div class="img-choose" style="margin:inherit;margin-bottom:10px">
                                <div class="img-choose-container">
                                    <img src="' . base_url('/public/images/testimoni/') . $image . '?r=' . time() . '"/>
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
                </div>

                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Testimoni *</label>
                    <div class="col-sm-10 col-md-4">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= @$testimoni['nama']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title *</label>
                    <div class="col-sm-10 col-md-4">
                        <input type="text" name="title" id="title" class="form-control" value="<?= @$testimoni['title']; ?>">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="deskripsi" id="deskripsi"><?= @$testimoni['deskripsi']; ?></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <input type="hidden" name="id" id="id" value="<?= @$testimoni['id']; ?>">
                <input type="hidden" name="method" value="<?= @$testimoni['id'] ? 'ubah' : 'simpan'; ?>">
                <button type="submit" class="btn btn-primary"><?= @$testimoni['id'] ? 'Ubah' : 'Simpan'; ?></button>
                <a href="<?= base_url('admin/testimoni'); ?>" class="btn btn-default">Batal</a>
            </form>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?= base_url('public/dist/js/') . 'image-upload.js?r=' . time(); ?>"></script>

<script>
    $(function() {
        $('#deskripsi').summernote();

        $('form#form-testimoni input').on('change', function() {
            $(this).parent('.col-sm-10').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('#form-testimoni').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const type = $('[name="method"]').val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/testimoni/ajaxSaveData'); ?>",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        showAlert('success', response.message);
                        setTimeout(function() {
                            window.location.href = '<?= base_url('admin/testimoni/'); ?>';
                        }, 1000);
                    } else {
                        if (response.error_input) {
                            for (let i = 0; i < response.error_input.length; i++) {
                                $('[name="' + response.error_input[i] + '"]').parent().addClass('has-error');
                                $('[name="' + response.error_input[i] + '"]').next('.help-block').text(response.error_string[i]);
                            }
                        }

                        if (response.status == 'required') {
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