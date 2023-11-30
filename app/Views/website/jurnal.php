<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<section class="bg-100">

    <div class="container">
        <div class="text-center mb-6 mt-3">
            <h3 class="fs-2 fs-md-3"><?= strtoupper($title); ?></h3>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-6">
                    <div class="card-body table-responsive" style="border: 0">
                        <table id="table-result" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Fakultas</th>
                                    <th>Nama Jurnal</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jurnal as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama_fakultas']; ?></td>
                                        <td><a href="<?= $value['link']; ?>" target="_blank"><?= $value['nama_jurnal']; ?></a></td>
                                        <td><?= ucwords($value['kategori']); ?></td>
                                        <td style="vertical-align: middle;">
                                            <div class="btn-group">
                                                <a class="btn-sm btn btn-outline-primary" href="<?= $value['link']; ?>" target="_blank"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table-result').DataTable();
    });
</script>