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

<section>

    <div class="container">
        <div class="row justify-content-center row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?php foreach ($layanan as $key => $layanan) { ?>
                <div class="col">
                    <a href="<?= base_url('layanan/') . $layanan['slug_layanan']; ?>">
                        <div class="border rounded p-3 mb-4 text-center">
                            <span class="text-900 fs-3 <?= $layanan['icon']; ?>"></span>
                            <input class="form-control form-control-sm mt-3 text-center text-dark bg-200" value="<?= $layanan['nama_layanan']; ?>" />
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- end of .container-->

</section>