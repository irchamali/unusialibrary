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

        <div class="bg-holder overlay" style="background-image:url(../assets/img/background-2.jpg);background-position:center bottom;"></div>

        <div class="container">
            <div class="row pt-6" data-inertia='{"weight":1.5}'>
                <div class="col-md-8 text-white" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <div class="overflow-hidden">
                        <h1 class="text-white fs-4 fs-md-5 mb-0 lh-1" data-zanim-xs='{"delay":0}'><?= $title; ?></h1>
                        <div class="nav" aria-label="breadcrumb" role="navigation" data-zanim-xs='{"delay":0.1}'>
                            <ol class="breadcrumb fs-1 ps-0 fw-bold">
                                <li class="breadcrumb-item"><a class="text-white" href="<?= base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="bg-100">

        <div class="container">
            <div class="row g-0">
                <div class="col-lg-4 py-3 py-lg-0 position-relative" style="min-height:400px; background-position: top">
                    <div class="bg-holder rounded-ts-lg rounded-lg-bs-lg rounded-te-lg rounded-lg-te-0" style="background-image:url(public/assets/img/sejarah_visi_misi_struktur_organisasi.jpg);"></div>
                </div>
                <div class="col-lg-8 px-5 py-6 my-lg-0 bg-white rounded-lg-te-lg rounded-be-lg rounded-bs-lg rounded-lg-bs-0 d-flex align-items-center">
                    <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <h5 data-zanim-xs='{"delay":0}'> <?= strtoupper($settingApp['title']); ?></h5>
                        <p class="my-4" data-zanim-xs='{"delay":0.1}'><?= $settingProfile['alamat']; ?></p>
                        <p class="my-4" data-zanim-xs='{"delay":0.2}'>Email</p>
                        <p class="my-4" data-zanim-xs='{"delay":0.2}'><?= $settingProfile['phone']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col">
                    <h3 class="text-center fs-2 fs-md-3"><?= $title; ?></h3>
                    <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                </div>
                <div class="col-12">
                    <div class="bg-white px-3 mt-6 px-0 py-5 px-lg-5 rounded-3">
                        <img style="width: 100%;" src="<?= base_url('public/assets/img/') . $settingProfile['struktur_organisasi']; ?>" alt="Struktur Organisasi">
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>