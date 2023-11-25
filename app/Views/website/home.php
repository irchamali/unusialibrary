<style>
    body {
        margin: 0;
        padding: 0;
    }

    .jam_layanan_content {
        text-align: center;
        position: relative;
        margin: 20vh auto;
    }

    .jam_layanan img {
        width: 500px;
        height: 500px;
        margin-bottom: 15px;
        border-radius: 0.625rem;
    }

    .jam_layanan {
        background-color: rgb(0, 0, 0, 0.625);
        z-index: 9999;
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        transition: all .5s ease-in;
    }

    .jam_layanan_show {
        display: inline;
    }

    .jam_layanan_hide {
        display: none;
        transition: all .5s ease-out;
    }
</style>

<div class="jam_layanan">
    <div class="jam_layanan_content">
        <img src="<?= base_url('public/images/jam_layanan_perpus1.png'); ?>" alt="">
    </div>
</div>

<script>
    var jam_layanan = document.querySelector(".jam_layanan");
    jam_layanan.classList.add("jam_layanan_show");

    window.addEventListener('click', function() {
        jam_layanan.classList.remove("jam_layanan_show");
        jam_layanan.classList.add("jam_layanan_hide");
    });
</script>

<section class="py-0">
    <div class="swiper theme-slider min-vh-100" data-swiper='{"loop":true,"allowTouchMove":false,"autoplay":{"delay":5000},"effect":"fade","speed":800}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide" data-zanim-timeline="{}">
                <div class="bg-holder" style="background-image:url(public/assets/img/header-1.jpg);"></div>

                <div class="container">
                    <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                        <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                            <div class="overflow-hidden">
                                <h1 class="fs-4 fs-md-5 lh-1" data-zanim-xs='{"delay":0}'>Growth Partners</h1>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs" data-zanim-xs='{"delay":0.1}'>Connect with top consultants hand-picked by Elixir consulting and finance.</p>
                            </div>
                            <div class="overflow-hidden">
                                <div data-zanim-xs='{"delay":0.2}'>
                                    <a class="btn btn-primary me-3 mt-3" href="#!">
                                        Selengkapnya <span class="fas fa-chevron-right ms-2"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-nav">
                <div class="swiper-button-prev"><span class="fas fa-chevron-left"></span></div>
                <div class="swiper-button-next"><span class="fas fa-chevron-right"></span></div>
            </div>
        </div>
</section>


<!-- PROFILE -->
<!-- <section class="bg-white text-center">

    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-10 col-md-6">
                <h3 class="fs-2 fs-lg-3">PROFILE PERPUSTAKAAN</h3>
                <h5 class="px-lg-4 mt-3">UNUSIA GRHA MAHBUB DJUNAEDI</h5>
            </div>
            <div class="col-12">
                <div class="position-relative mt-4 py-5 py-md-11">
                    <div class="bg-holder rounded-3" style="background-image:url(public/assets/img/sejarah_visi_misi_struktur_organisasi.jpg);">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section> -->
<!-- END PROFILE -->

<!-- KOLEKSI TERBARU -->
<section class="bg-100 text-center">

    <div class="container">
        <div class="text-center mb-6">
            <h3 class="fs-2">KOLEKSI TERBARU</h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>

        <?php if (count($koleksi_terbaru) > 0) { ?>
            <div class="row g-4">
                <?php
                $index = 0;
                foreach ($koleksi_terbaru as $key => $value) {
                    if ($index == 6) {
                        break;
                    }
                    $index++;
                ?>
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

            <div class="row">
                <div class="col-auto mx-auto mt-4">
                    <a href="<?= base_url('book'); ?>" class="btn btn-warning">
                        <span class="text-primary fw-semi-bold">
                            Lihat Semua <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Koleksi terbaru sedang tidak tersedia</span></div>
        <?php }; ?>
    </div>

</section>
<!-- END KOLEKSI TERBARU -->

<!-- BERITA & AGENDA SERTA PENGUMUMAN -->
<section class="bg-primary">

    <div class="container">
        <!-- BERITA -->
        <div class="mb-4">
            <h3 class="fs-2 line-short text-white">BERITA TERBARU</h3>
        </div>

        <?php if (count($berita) > 0) { ?>
            <div class="row g-4 mb-6">
                <?php
                $index = 0;
                foreach ($berita as $key => $berita) {
                    if ($index == 3) {
                        break;
                    }
                    $index++;

                    setlocale(LC_TIME, 'id_ID.utf8');
                    $tanggal = new DateTime(@$berita['created_at']);
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <a href="<?= base_url('post/') . $berita['slug_artikel']; ?>">
                                <?php $image_artikel = @$berita['image_artikel'] ?  @$berita['image_artikel'] : 'no_image.png'; ?>
                                <img class="card-img-top" src="<?= base_url('public/images/artikel/') . $image_artikel; ?>" alt="<?= $berita['judul_artikel']; ?>" />
                            </a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= base_url('post/') . $berita['slug_artikel']; ?>">
                                        <h5 data-zanim-xs='{"delay":0}'><?= $berita['judul_artikel']; ?></h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="text-500 small" data-zanim-xs='{"delay":0.1}'>By <?= $berita['nama_pembuat']; ?> | <?= strftime('%d %B, %Y', $tanggal->getTimestamp()); ?></p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                        <a class="d-flex align-items-center" href="<?= base_url('post/') . $berita['slug_artikel']; ?>">
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
        <?php } else { ?>
            <div class="col-md-12 rounded-3 py-4 text-center bg-warning mb-6"><span class="text-uppercase mb-0">Berita sedang tidak tersedia</span></div>
        <?php }; ?>
        <!-- END BERITA -->

        <!-- PENGUMUMAN -->
        <div class="mb-4">
            <h3 class="fs-2 line-short text-white">PENGUMUMAN</h3>
        </div>

        <?php if (count($pengumuman) > 0) { ?>
            <div class="row g-4 mb-6">
                <?php
                $index = 0;
                foreach ($pengumuman as $key => $pengumuman) {
                    if ($index == 3) {
                        break;
                    }
                    $index++;
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <a href="<?= base_url('post/') . $pengumuman['slug_artikel']; ?>">
                                <?php $image_artikel = @$pengumuman['image_artikel'] ?  @$pengumuman['image_artikel'] : 'no_image.png'; ?>
                                <img class="card-img-top" src="<?= base_url('public/images/artikel/') . $image_artikel; ?>" alt="<?= $pengumuman['judul_artikel']; ?>" />
                            </a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= base_url('post/') . $pengumuman['slug_artikel']; ?>">
                                        <h5 data-zanim-xs='{"delay":0}'><?= $pengumuman['judul_artikel']; ?></h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $pengumuman['nama_pembuat']; ?></p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.2}'><?= $pengumuman['isi_artikel']; ?></p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                        <a class="d-flex align-items-center" href="<?= base_url('post/') . $pengumuman['slug_artikel']; ?>">
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
        <?php } else { ?>
            <div class="col-md-12 rounded-3 py-4 text-center bg-warning mb-6"><span class="text-uppercase mb-0">Pengumuman sedang tidak tersedia</span></div>
        <?php }; ?>
        <!-- END PENGUMUMAN -->

        <!-- AGENDA -->
        <div class="mb-4">
            <h3 class="fs-2 line-short text-white">AGENDA</h3>
        </div>

        <?php if (count($agenda) > 0) { ?>
            <div class="row g-4 mb-6">
                <?php
                $index = 0;
                foreach ($agenda as $key => $agenda) {
                    if ($index == 3) {
                        break;
                    }
                    $index++;
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <a href="<?= base_url('post/') . $agenda['slug_artikel']; ?>">
                                <?php $image_artikel = @$agenda['image_artikel'] ?  @$agenda['image_artikel'] : 'no_image.png'; ?>
                                <img class="card-img-top" src="<?= base_url('public/images/artikel/') . $image_artikel; ?>" alt="<?= $agenda['judul_artikel']; ?>" />
                            </a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= base_url('post/') . $agenda['slug_artikel']; ?>">
                                        <h5 data-zanim-xs='{"delay":0}'><?= $agenda['judul_artikel']; ?></h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $agenda['nama_pembuat']; ?></p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim-xs='{"delay":0.2}'><?= $agenda['isi_artikel']; ?></p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                        <a class="d-flex align-items-center" href="<?= base_url('post/') . $agenda['slug_artikel']; ?>">
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
        <?php } else { ?>
            <div class="col-md-12 rounded-3 py-4 text-center bg-warning mb-6"><span class="text-uppercase mb-0">Agenda sedang tidak tersedia</span></div>
        <?php }; ?>
        <!-- END AGENDA -->


    </div>
</section>
<!-- END BERITA & AGENDA SERTA PENGUMUMAN -->

<!-- TAUTAN -->
<div class="bg-200 py-6">
    <div class="container">
        <div class="swiper theme-slider" data-swiper='{"autoplay":true,"spaceBetween":30,"loop":true,"slidesPerView":1,"breakpoints":{"670":{"slidesPerView":2},"1200":{"slidesPerView":4}}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="https://www.unusia.ac.id/" target="_blank">
                        <img class="w-100" src="https://www.unusia.ac.id/assets/frontend/images/logo-basic.png" alt="Universitas Nahdlatul Ulama Indonesia" />
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.unusia.ac.id/" target="_blank">
                        <img class="w-100" src="https://kubuku.id/prod/img/logo/KBK755360d_head.png?=221811103346?img=232011094216" alt="Perpustakaan Universitas Nahdlatul Ulama Indonesia" />
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://lp2m.unusia.ac.id/" target="_blank">
                        <img class="w-100" src="https://lp2m.unusia.ac.id/assets/images/logo-lppm-unusia.png" alt="LP2M Unusia" />
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://lppmi.unusia.ac.id/" target="_blank">
                        <img class="w-100" src="https://lppmi.unusia.ac.id/assets/elixir/assets/img/logo-dark1.png" alt="LPPMI Unusia" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END TAUTAN -->

<!-- TESTIMONI -->
<section class="bg-white">

    <div class="container">
        <div class="text-center mb-6">
            <h3 class="fs-2">TESTIMONI</h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>

        <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":1,"autoplay":{"delay":5000}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row px-lg-8">
                        <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="<?= base_url('public'); ?>/assets/img/client1.png" alt="Member" /></div>
                        <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                            <p class="lead">Their work on our website and Internet marketing has made a significant different to our business. We’ve seen a 425% increase in quote requests from the website which has been pretty remarkable – but I’d always like to see more!</p>
                            <h6 class="fs-0 mb-1 mt-4">Michael Clarke</h6>
                            <p class="mb-0 text-500">CEO, A.E.T Institute</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row px-lg-8">
                        <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="<?= base_url('public'); ?>/assets/img/client2.png" alt="Member" /></div>
                        <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                            <p class="lead">Writing case studies was a daunting task for us. We didn’t know where to begin or what questions to ask, and clients never seemed to follow through when we asked. Elixir team did everything – with almost no time or effort for me!</p>
                            <h6 class="fs-0 mb-1 mt-4">Maria Sharapova</h6>
                            <p class="mb-0 text-500">Managing Director, Themewagon Inc.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row px-lg-8">
                        <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="<?= base_url('public'); ?>/assets/img/client3.png" alt="Member" /></div>
                        <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                            <p class="lead">As a sales gamification company, we were skeptical to work with a consultant to optimize our sales emails, but Elixir was highly recommended by many other Y-Combinator startups we knew. Elixir helped us run a ~6 week email campaign.</p>
                            <h6 class="fs-0 mb-1 mt-4">David Beckham</h6>
                            <p class="mb-0 text-500">Chairman, Harmony Corporation</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-nav">
                <div class="swiper-button-prev icon-item icon-item-lg"><span class="fas fa-chevron-left fs--2"></span></div>
                <div class="swiper-button-next icon-item icon-item-lg"><span class="fas fa-chevron-right fs--2"></span></div>
            </div>
        </div>
    </div>

</section>
<!-- END TESTIMONI -->