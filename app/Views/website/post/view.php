<?php
setlocale(LC_TIME, 'id_ID.utf8');
$tanggal = new DateTime($artikel['tanggal_terbit']);
$artikel_image = $artikel['image_artikel'] ? base_url('public/images/artikel/') . $artikel['image_artikel'] : base_url('public/images/no_image.png');
?>


<section class="bg-100">

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-6">
                    <img class="card" src="<?= $artikel_image; ?>" alt="<?= $artikel['judul_artikel']; ?>" />
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <h4 data-zanim-xs='{"delay":0}'><?= $artikel['judul_artikel']; ?></h4>
                        </div>

                        <div class="overflow-hidden">
                            <p data-zanim-xs='{"delay":0.1}'>
                                By <?= $artikel['nama']; ?> / <a href="<?= base_url('category/') . $artikel['slug_kategori'] ?>"><?= $artikel['nama_kategori']; ?></a> / <?= strftime('%d %B %Y', $tanggal->getTimestamp()); ?>
                            </p>
                        </div>

                        <div data-zanim-xs='{"delay":0.2}' class="mt-3">
                            <?= $artikel['isi_artikel']; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ms-auto mt-5 mt-lg-0">
                <div class="px-2">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="text-center">Category</h5>
                            <ul class="mt-3">
                                <?php foreach ($artikel_category as $key => $value) { ?>
                                    <li><a href="<?= base_url('category/') . $value['slug_kategori']; ?>"><?= $value['nama_kategori']; ?></a></li>
                                <?php }; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Tags</h5>
                            <ul class="nav tags mt-3">
                                <?php foreach ($artikel['tag'] as $key => $value) { ?>
                                    <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?= base_url('tags/') . $value['slug_tag']; ?>"><?= $value['nama_tag']; ?></a></li>
                                <?php }; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>