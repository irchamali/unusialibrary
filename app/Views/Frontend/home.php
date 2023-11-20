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

    <section class="py-0">
        <div class="swiper theme-slider min-vh-100" data-swiper='{"loop":true,"allowTouchMove":false,"autoplay":{"delay":5000},"effect":"fade","speed":800}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-zanim-timeline="{}">
                    <div class="bg-holder" style="background-image:url(public/assets/img/bg1.jpg);"></div>

                    <div class="container">
                        <div class="row min-vh-100 py-8 align-items-center" data-inertia='{"weight":1.5}'>
                            <div class="col-sm-8 col-lg-7 px-5 px-sm-3">
                                <div class="overflow-hidden">
                                    <h1 class="fs-4 fs-md-5 lh-1  text-white" data-zanim-xs='{"delay":0}'>Unusia Library</h1>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-primary pt-4 mb-5 fs-1 fs-md-2 lh-xs  text-white" data-zanim-xs='{"delay":0.1}'>Selamat datang di pustaka digital sumber referensi nusantara.</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div data-zanim-xs='{"delay":0.2}'>
                                        <a class="btn btn-primary me-3 mt-3" href="<?= base_url('') ?>/book-collection">
                                            Selengkapnya <span class="fas fa-chevron-right ms-2"></span>
                                        </a>

                                        <a class="btn btn-warning mt-3" href="<?= base_url('') ?>/contact">
                                            Kontak Kami <span class="fas fa-chevron-right ms-2"></span>
                                        </a>
                                    </div>
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

    <section class="bg-100">

        <div class="container">
            <div class="row align-items-stretch justify-content-center mb-4">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-body px-5">
                            <h5 class="mb-3">Head Office</h5>
                            <p class="mb-0 text-1100">
                                <?= $settingProfile['alamat']; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-body px-5">
                            <h5 class="mb-3">Jam Operasional</h5>
                            <?= $settingProfile['jam_operasional']; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-body px-5">
                            <h5>Sosial Media</h5>

                            <a class="d-inline-block mt-2" href="mailto:<?= $settingMediaSosial['email']; ?>" target="_blank">
                                <svg class="svg-inline--fa fa-w-14 fs-2 mx-2 text-primary" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                                </svg>
                            </a>

                            <a class="d-inline-block mt-2" href="<?= $settingMediaSosial['facebook']; ?>" target="_blank">
                                <svg class="svg-inline--fa fa-w-14 fs-2 mx-2 text-primary" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                                </svg>
                            </a>

                            <a class="d-inline-block mt-2" href="<?= $settingMediaSosial['instagram']; ?>" target="_blank">
                                <svg class="svg-inline--fa fa-w-14 fs-2 mx-2 text-primary" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </a>

                            <a class="d-inline-block mt-2" href="<?= $settingMediaSosial['whatsapp']; ?>" target="_blank">
                                <svg class="svg-inline--fa fa-w-14 fs-2 mx-2 text-primary" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="text-center">

        <div class="container">
            <div class="text-center">
                <h3 class="fs-2 fs-md-3">Layanan Kami</h3>
                <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="px-3 py-4 px-lg-4">
                        <div class="overflow-hidden"><img src="<?= base_url('public') ?>/assets/img/icons/sharing.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                        <div class="overflow-hidden">
                            <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Creative Support</h5>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We transform brands, grow businesses, and tell brand and product stories in a most creative way.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="px-3 py-4 px-lg-4">
                        <div class="overflow-hidden"><img src="<?= base_url('public') ?>/assets/img/icons/sharing.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                        <div class="overflow-hidden">
                            <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Creative Support</h5>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We transform brands, grow businesses, and tell brand and product stories in a most creative way.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="px-3 py-4 px-lg-4">
                        <div class="overflow-hidden"><img src="<?= base_url('public') ?>/assets/img/icons/sharing.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                        <div class="overflow-hidden">
                            <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Creative Support</h5>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We transform brands, grow businesses, and tell brand and product stories in a most creative way.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 mt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="px-3 py-4 px-lg-4">
                        <div class="overflow-hidden"><img src="<?= base_url('public') ?>/assets/img/icons/sharing.png" alt="icon" height="37" data-zanim-xs='{"delay":0}' /></div>
                        <div class="overflow-hidden">
                            <h5 class="mt-3" data-zanim-xs='{"delay":0.1}'>Creative Support</h5>
                        </div>
                        <div class="overflow-hidden">
                            <p class="mb-0" data-zanim-xs='{"delay":0.2}'>We transform brands, grow businesses, and tell brand and product stories in a most creative way.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="bg-100">

        <div class="container">
            <div class="text-center mb-6">
                <h3 class="fs-2 fs-md-3">Buku Populer</h3>
                <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
            </div>
            <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":1,"autoplay":{"delay":5000}}'>
                <?php if (count($koleksi_buku) > 0) { ?>
                    <div class="swiper-wrapper">
                        <?php
                        $index = 0;
                        foreach ($koleksi_buku as $key => $value) {
                            if ($index == 5) {
                                break;
                            }
                            $index++;
                        ?>
                            <div class="swiper-slide">
                                <div class="row px-lg-8">
                                    <div class="col-4 col-md-3 mx-auto"><img class="rounded-3 mx-auto img-fluid" src="<?= $value['book_cover'] ?>" alt="<?= $value['book_title']; ?>" /></div>
                                    <div class="col-md-9 mt-4 mt-md-0 px-4 px-sm-3">
                                        <a href="<?= $value['book_url']; ?>" target="_blank">
                                            <p class="lead"><?= $value['book_title']; ?></p>
                                            <h6 class="fs-0 mb-1 mt-4">Penulis</h6>
                                            <p class="mb-0 text-500"><?= $value['penulis']; ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-prev icon-item icon-item-lg"><span class="fas fa-chevron-left fs--2"></span></div>
                        <div class="swiper-button-next icon-item icon-item-lg"><span class="fas fa-chevron-right fs--2"></span></div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Buku populer sedang tidak tersedia</span></div>
                <?php } ?>
            </div>
        </div>

    </section>

    <section class="bg-white">

        <div class="container">
            <div class="text-center mb-6">
                <h3 class="fs-2 fs-md-3">Event & Informasi</h3>
                <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card"><a href="<?= base_url('public') ?>/news/news.html"><img class="card-img-top" src="<?= base_url('public') ?>/assets/img/9.jpg" alt="Featured Image" /></a>
                        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden"><a href="<?= base_url('public') ?>/news/news.html">
                                    <h5 data-zanim-xs='{"delay":0}'>Tax impacts of lease mean accounting change</h5>
                                </a></div>
                            <div class="overflow-hidden">
                                <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Paul O'Sullivan</p>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mt-3" data-zanim-xs='{"delay":0.2}'>HMRC released a consultation document to flag some potential tax impacts that a forthcoming change...</p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= base_url('public') ?>/news/news.html">Learn More
                                        <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card"><a href="<?= base_url('public') ?>/news/news.html"><img class="card-img-top" src="<?= base_url('public') ?>/assets/img/10.jpg" alt="Featured Image" /></a>
                        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden"><a href="<?= base_url('public') ?>/news/news.html">
                                    <h5 data-zanim-xs='{"delay":0}'>What brexit means for data protection law</h5>
                                </a></div>
                            <div class="overflow-hidden">
                                <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Enrico Ambrosi</p>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Assuming that the referendum is not ignored completely, there are two possible futures for the UK...</p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= base_url('public') ?>/news/news.html">Learn More
                                        <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card"><a href="<?= base_url('public') ?>/news/news.html"><img class="card-img-top" src="<?= base_url('public') ?>/assets/img/11.jpg" alt="Featured Image" /></a>
                        <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden"><a href="<?= base_url('public') ?>/news/news.html">
                                    <h5 data-zanim-xs='{"delay":0}'>The growing meanace of social engineering fraud</h5>
                                </a></div>
                            <div class="overflow-hidden">
                                <p class="text-500" data-zanim-xs='{"delay":0.1}'>By Robson</p>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mt-3" data-zanim-xs='{"delay":0.2}'>Social engineering involves the collection of information from various sources about a target...</p>
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-inline-block" data-zanim-xs='{"delay":0.3}'><a class="d-flex align-items-center" href="<?= base_url('public') ?>/news/news.html">Learn More
                                        <div class="overflow-hidden ms-2" data-zanim-xs='{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}'><span class="d-inline-block fw-medium">&xrarr;</span></div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-auto mx-auto mt-4">
                    <a href="" class="btn btn-warning">
                        <span class="text-primary fw-semi-bold">
                            Lihat Semua <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <section class="bg-100">

        <div class="container">
            <div class="text-center mb-6">
                <h3 class="fs-2 fs-md-3">Koleksi Buku</h3>
                <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
            </div>
            <?php if (count($koleksi_buku) > 0) { ?>
                <div class="row g-4">
                    <?php
                    $index = 0;
                    foreach ($koleksi_buku as $key => $value) {
                        if ($index == 3) {
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
                <div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Koleksi buku sedang tidak tersedia</span></div>
            <?php }; ?>
        </div>

    </section>

</main>