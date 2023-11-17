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
        top: 50px;
        right: 15px;
        cursor: pointer;
    }

    .modal-body {
        height: 70vh;
        overflow-y: auto;
    }
</style>
<form id="form-user" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="image">Image</label>
        <?php
        $image = @$_FILES['file']['name'] ?: @$user['image'];
        if (!empty($image) && file_exists(ROOTPATH . 'public/images/' . $image)) {
            echo '<div class="img-choose" style="margin:inherit;margin-bottom:10px">
                    <div class="img-choose-container">
                        <img src="' . base_url('/public/images/') . $image . '?r=' . time() . '"/>
                        <a href="javascript:void(0)" class="btn-remove-img btn btn-danger"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                ';
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
        <label for="nama">Nama Lengkap *</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= @$user['nama']; ?>">
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        <label for="email">Email *</label>
        <input type="text" name="email" id="email" class="form-control" value="<?= @$user['email']; ?>">
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        <label for="username">Username *</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= @$user['username']; ?>">
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        <label for="password">Password <?= @$user['user_id'] ? '' : '*'; ?></label>
        <input type="password" name="password" id="password" class="form-control">
        <span class="help-block"> <?= @$user['user_id'] ? 'Kosongkan jika tidak diubah' : ''; ?></span>
    </div>

    <div class="form-group">
        <label for="is_active">Status</label>
        <?= form_dropdown(
            ['name' => 'is_active', 'id' => 'is_active', 'class' => 'form-control'],
            ['1' => 'Aktif', '0' => 'Tidak Aktif'],
            @$user['is_active']
        ) ?>
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        <label for="role_id">Role</label>
        <?php
        foreach ($role as $key => $val) {
            $option_role[$val['role_id']] = $val['nama_role'];
        }

        if (!empty($user['role_user'])) {
            foreach ($user['role_user'] as $val) {
                $role_id_selected[] = $val['role_id'];
            }
        }
        ?>

        <?= form_dropdown(
            ['name' => 'role_id[]', 'id' => 'role_id', 'multiple' => 'multiple', 'class' => 'form-control select2'],
            $option_role,
            @$role_id_selected
        ) ?>
        <span class="help-block"></span>
    </div>

    <input type="hidden" name="id" id="id" value="<?= @$user['user_id']; ?>">
</form>
<script type="text/javascript" src="<?= base_url('public/backend/dist/js/') . 'image-upload.js?r=' . time(); ?>"></script>
<script>
    $(function() {
        $('form#form-user input,select').on('change', function() {
            $(this).parent('.form-group').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('.select2').select2();
    });
</script>