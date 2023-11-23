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

<section class="bg-100">

    <div class="container">
        <div class="overflow-hidden mb-4 text-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <h4 data-zanim-xs='{"delay":0}'><?= $title . ' ' . $setting['nama_website']; ?></h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-6">
                    <div class="card-body p-5">
                        <?= $setting['sejarah']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>