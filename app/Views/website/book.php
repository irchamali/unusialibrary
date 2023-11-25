<section class="bg-100">

    <div class="container">
        <div class="text-center mb-6 mt-3">
            <h3 class="fs-2 fs-md-3"><?= strtoupper($title); ?></h3>
        </div>

        <?php if (count($koleksi_buku) > 0) { ?>
            <div class="row g-4">
                <?php foreach ($koleksi_buku as $key => $value) { ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card"><a href="<?= $value['book_url']; ?>" target="_blank"><img class="card-img-top" src="<?= $value['book_cover']; ?>" alt="<?= $value['book_title']; ?>" /></a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= $value['book_url']; ?>" target="_blank">
                                        <h5 data-zanim-xs='{"delay":0}'><?= $value['book_title']; ?></h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="text-500" data-zanim-xs='{"delay":0.1}'><?= $value['penulis']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Buku sedang tidak tersedia</span></div>
        <?php }; ?>
    </div>

</section>