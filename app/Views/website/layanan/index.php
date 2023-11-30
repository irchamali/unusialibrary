<section class="bg-100" data-zanim-timeline="{}" data-zanim-trigger="scroll">

    <div class="container">
        <div class="text-center mb-6 mt-3">
            <h3 class="fs-2 fs-md-3"><?= $title; ?></h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>

        <div class="row">
            <?php foreach ($layanan as $key => $layanan) { ?>
                <div class="col-md-4" data-zanim-xs='{"delay":0.<?= $key; ?>}'>
                    <a href="<?= base_url('layanan/') . $layanan['slug_layanan']; ?>">
                        <div class="border rounded p-3 mb-4 text-center">
                            <span class="fs-3 <?= $layanan['icon']; ?>"></span>
                            <!-- <h6 data-zanim-xs='{"delay":0}'><?= $layanan['nama_layanan']; ?></h6> -->
                            <input class="form-control form-control-sm mt-3 text-center" value="<?= $layanan['nama_layanan']; ?>" />
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</section>