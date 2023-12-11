<section class="bg-100">

    <div class="container">
        <div class="text-center mb-6 mt-3">
            <h3 class="fs-2 fs-md-3"><?= $title; ?></h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>

        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card">
                    <div class="card-body">
                    <img class="card" width="100%" src="<?= base_url('public/images/users/mahbub-djunaidi.jpg'); ?>" alt="Image" />
                    <h5>Mahbub Djunaidi</h5>
                    </div>    
                </div>    
            </div>
            <div class="col-lg-9">
                <div class="card mb-3">
                    <div class="card-body text-justify">
                        <?= $setting['biografi']; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>