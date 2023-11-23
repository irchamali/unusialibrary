<section>

    <div class="bg-holder overlay" style="background-image:url(public/assets/img/background-2.jpg);background-position:center bottom;"></div>

    <div class="container">
        <div class="row pt-6">
            <div class="col-md-12 text-center text-white" data-zanim-timeline="{}">
                <div class="overflow-hidden">
                    <h1 class="text-white fs-4 lh-1" data-zanim-xs="{delay:0}" style="transform: translate(0px, 0px); opacity: 1;"><?= $title; ?></h1>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="bg-100">

    <div class="container">
        <div class="row g-4">
            <?php
            foreach ($berita as $key => $berita) {
                setlocale(LC_TIME, 'id_ID.utf8');
                $tanggal = new DateTime(@$berita['created_at']);
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <a href="<?= base_url('news/') . $berita['slug_artikel']; ?>">
                            <?php $image_artikel = @$berita['image_artikel'] ?  @$berita['image_artikel'] : 'no_image.png'; ?>
                            <img class="card-img-top" src="<?= base_url('public/images/artikel/') . $image_artikel; ?>" alt="<?= $berita['judul_artikel']; ?>" />
                        </a>
                        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden"><a href="<?= base_url('news/') . $berita['slug_artikel']; ?>">
                                    <h5 data-zanim-xs='{"delay":0}'><?= $berita['judul_artikel']; ?></h5>
                                </a></div>
                            <div class="overflow-hidden">
                                <p class="text-500 small" data-zanim-xs='{"delay":0.1}'>By <?= $berita['nama_pembuat']; ?> | <?= strftime('%d %B, %Y', $tanggal->getTimestamp()); ?></p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                    <a class="d-flex align-items-center" href="<?= base_url('news/') . $berita['slug_artikel']; ?>">
                                        Selengkapnya
                                        <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'>
                                            <span class="d-inline-block fw-medium">&xrarr;</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- <div class="row">
            <div class="col-auto mx-auto mt-4">
                <nav class="mt-5" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link lh-sm" href="#" aria-label="Previous"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                        <li class="page-item"><a class="page-link lh-sm" href="#!">1</a></li>
                        <li class="page-item active"><a class="page-link lh-sm" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link lh-sm" href="#!">3</a></li>
                        <li class="page-item"><a class="page-link lh-sm" href="#!">4</a></li>
                        <li class="page-item"><a class="page-link lh-sm" href="#!" aria-label="Next"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                    </ul>
                </nav>
            </div>
        </div> -->
    </div>
    <!-- end of .container-->

</section>