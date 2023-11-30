<section class="bg-100">

    <div class="container">
        <div class="text-center mb-6 mt-3">
            <h3 class="fs-2 fs-md-3"><?= $layanan['nama_layanan']; ?></h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-6">
                    <div class="card-body p-5">
                        <!-- <h4></h4> -->
                        <?= $layanan['keterangan']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>