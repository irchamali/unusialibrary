<section class="text-center py-0">
    <?php
    // echo "<pre>";
    // print_r($this->data['msg']);
    // echo "</pre>";
    ?>
    <div class="bg-holder overlay overlay-elixir" style="background-image:url(../assets/img/background-14.jpg);"></div>

    <div class="container">
        <div class="row min-vh-100 align-items-center text-white">
            <div class="col" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <a href="" data-zanim-xs='{"delay":0}'>
                    <img src="<?= base_url('public/frontend') ?>/assets/img/unulib-dark.png" alt="logo" data-zanim-xs='{"delay":0.1}' />
                </a>
                <h1 class="fs-4 fs-sm-6 fs-md-8 text-white mt-5" data-zanim-xs='{"delay":0.2}'>404</h1>
                <h5 class="text-uppercase ls text-white fs-0 fs-md-1" data-zanim-xs='{"delay":0.3}'><?= $this->data['msg']['message']; ?></h5>
                <div data-zanim-xs='{"delay":0.4}'><a class="btn btn-lg btn-warning rounded-pill mt-4" href="">Kembali</a></div>
            </div>
        </div>
    </div>

</section>