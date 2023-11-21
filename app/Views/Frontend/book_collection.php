<main class="main" id="top">
    <div class="preloader" id="preloader">
        <div class="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <section>

        <div class="bg-holder overlay" style="background-image:url(public/assets/img/bg.jpg);background-position:center bottom;"></div>

        <div class="container">
            <div class="row pt-6" data-inertia='{"weight":1.5}'>
                <div class="col-md-8 text-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="overflow-hidden">
                        <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'>Koleksi Umum</h1>
                        <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
                            <ol class="breadcrumb fs-1 ps-0 fw-bold">
                                <li class="breadcrumb-item"><a class="text-white" href="<?= base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Koleksi Umum</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="bg-100">

        <div class="container">
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
        </div>

    </section>

</main>