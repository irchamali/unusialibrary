<form id="form-module-permission" method="post">
    <div class="form-group">
        <label for="module_id">Module</label>
        <?= form_dropdown(['name' => 'module_id', 'id' => 'module_id', 'class' => 'form-control select2', 'style="width:100% !important"'], $module, @$module_permission['module_id']) ?>
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        <label for="generate_permission">Permission</label>
        <?= form_dropdown(
            ['name' => 'generate_permission', 'id' => 'generate_permission', 'class' => 'form-control'],
            ['crud_all' => 'CRUD All', 'crud_own' => 'CRUD Own', 'crud_all_crud_own' => 'CRUD All + CRUD Own']
        ) ?>
        </br>
        <small class="text-bold">CRUD All: otomatis akan membuat permission CRUD All, yaitu: create, read_all, update_all, delete_all (jika permission sudah ada, maka tidak akan dibuat). </br> CRUD Own berarti read_own, update_own, dan delete_own</small>
        <span class="help-block"></span>
    </div>

    <!-- <input type="hidden" name="id" id="id" value="<?= @$module_permission['module_permission_id']; ?>"> -->
</form>

<script>
    $(function() {
        $('form#form-module-permission select').on('change', function() {
            $(this).parent('.form-group').removeClass('has-error');
            $(this).next('.help-block').text('');
        });

        $('.select2').select2();
    });
</script>