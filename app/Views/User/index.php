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
            <div class="row">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-sm <?= $settingLayout['button']; ?> btn-add"><i class="fa fa-plus"></i> Tambah Data</button>
                    <button type="button" class="btn btn-sm btn-default btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </div>
                <div class="form-group col-sm-4 text-center">
                    <!--  -->
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive px-3 pb-3" style="border: 0">
            <?php
            $th = '';
            $column = [
                'ignore_image' => 'Image',
                'username' => 'Username',
                'email' => 'Email',
                'nama' => 'Nama',
                'nama_role' => 'Role',
                'status' => 'Status',
                'ignore_btn' => 'Aksi'
            ];
            $setting['order'] = [3, 'asc'];
            $index = 0;
            foreach ($column as $key => $val) {
                $th .= '<th>' . $val . '</th>';
                $column_dt[] = ['data' => $key];
                if (strpos($key, 'ignore') !== false) {
                    $setting['columnDefs'][] = ["targets" => $index, "orderable" => false];
                }
                $index++;
            }
            ?>
            <table id="table-result" class="w-100 table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <?= $th ?>
                    </tr>
                </thead>
            </table>
            <span id="dataTables-column" style="display:none"><?= json_encode($column_dt) ?></span>
            <span id="dataTables-setting" style="display:none"><?= json_encode($setting) ?></span>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('#table-result').delegate('.change-status', 'click', function(e) {
            e.preventDefault();
            id = $(this).attr('data-id');
            type = $(this).attr('data-type');
            $.ajax({
                type: "POST",
                url: currentURL + '/ajaxChangeStatus',
                data: "id=" + id + "&type=" + type,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $('.btn-refresh').click();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                }
            });
        });
    });
</script>