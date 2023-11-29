<section class="bg-100">

    <div class="container">
        <div class="text-left mb-6 mt-3">
            <h3 class="fs-2 fs-md-3">Category : <?= $category['nama_kategori']; ?></h3>
        </div>

        <?php if (count($category['artikel']) > 0) { ?>
            <div class="row g-4">
                <?php
                $num_char = 200;
                foreach ($category['artikel'] as $key => $value) {
                    $artikel_image = $value['image_artikel'] ? base_url('public/images/artikel/') . $value['image_artikel'] : base_url('public/images/no_image.png');
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <a href="<?= base_url('post/') . $value['slug_artikel']; ?>">
                                <img class="card-img-top" src="<?= $artikel_image; ?>" alt="<?= $value['judul_artikel']; ?>" />
                            </a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <a href="<?= base_url('post/') . $value['slug_artikel']; ?>">
                                        <h5 data-zanim-xs='{"delay":0}'><?= $value['judul_artikel']; ?></h5>
                                    </a>
                                </div>

                                <div class="overflow-hidden">
                                    <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $value['nama']; ?></p>
                                </div>

                                <!-- <div class="overflow-hidden">
                                    <p class="" data-zanim-xs='{"delay":0.2}'><?= substr($value['isi_artikel'], 0, $num_char) . '...'; ?></p>
                                </div> -->

                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                        <a class="d-flex align-items-center" href="<?= base_url('post/') . $value['slug_artikel']; ?>">
                                            Selengkapnya
                                            <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0"><?= $category['nama_kategori']; ?> sedang tidak tersedia</span></div>
        <?php }; ?>
    </div>

</section>