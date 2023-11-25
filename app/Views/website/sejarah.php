<section class="bg-100">

    <div class="container">
        <div class="text-center mb-6 mt-3">
            <h3 class="fs-2 fs-md-3"><?= strtoupper($title); ?></h3>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-6">
                    <div class="card-body p-5">
                        <h4><?= $title . ' ' . $setting['nama_website']; ?></h4>
                        <?= $setting['sejarah']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>