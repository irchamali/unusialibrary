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
<section class="bg-white text-center">

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

</section>
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
                    <a href="<?= base_url('book-collection'); ?>" class="btn btn-warning">
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

        <div class="row g-4 mb-6">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Berita</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Berita...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Berita</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Berita...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Berita</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Berita...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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
        </div>
        <!-- END BERITA -->

        <!-- AGENDA -->
        <div class="mb-4">
            <h3 class="fs-2 line-short text-white">AGENDA</h3>
        </div>

        <div class="row g-4 mb-6">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Agenda</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Agenda...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Agenda</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Agenda...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Agenda</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Agenda...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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
        </div>
        <!-- END AGENDA -->

        <!-- PENGUMUMAN -->
        <div class="mb-4">
            <h3 class="fs-2 line-short text-white">PENGUMUMAN</h3>
        </div>

        <div class="row g-4 mb-6">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Pengumuman</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Pengumuman...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Pengumuman</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Pengumuman...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <a href="news/news.html">
                        <img class="card-img-top" src="<?= base_url('public'); ?>/assets/img/9.jpg" alt="Featured Image" />
                    </a>
                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden"><a href="news/news.html">
                                <h5 data-zanim-xs='{"delay":0}'>Judul Pengumuman</h5>
                            </a></div>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Pembuat</p>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Isi Pengumuman...</p>
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'>
                                <a class="d-flex align-items-center" href="news/news.html">
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
        </div>
        <!-- END PENGUMUMAN -->
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