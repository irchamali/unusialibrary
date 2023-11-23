<section class="text-center py-0">

    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <a href="" data-zanim-xs='{"delay":0}'>
                    <img src="<?= base_url('public/images/') . $setting['logo_header']; ?>" alt="<?= $setting['nama_website']; ?>" data-zanim-xs='{"delay":0.1}' />
                </a>
                <h1 class="fs-4 fs-sm-6 mt-5" data-zanim-xs='{"delay":0.2}'>404</h1>
                <h5 class="text-uppercase ls fs-0" data-zanim-xs='{"delay":0.3}'><?= $this->data['msg']['message']; ?></h5>
                <div data-zanim-xs='{"delay":0.4}'><a class="btn btn-warning rounded-pill mt-4" href="<?= base_url(); ?>">Kembali</a></div>
            </div>
        </div>
    </div>

</section>