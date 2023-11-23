<section class="bg-100">
    <?php
    setlocale(LC_TIME, 'id_ID.utf8');
    $tanggal = new DateTime(@$berita['created_at']);
    $image_berita = @$berita['image'] ? @$berita['image'] : 'no_image.png';
    $image_pembuat = @$berita['image_pembuat'] ? @$berita['image_pembuat'] : 'no_image.png';
    ?>
    <div class="container">
        <div class="overflow-hidden mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div data-zanim-xs='{"delay":0}'>
                <a class="d-inline-block text-500" href="Javascript:void(0);"><?= @$berita['nama_pembuat']; ?></a>, &nbsp;
                <a class="d-inline-block text-500" href="Javascript:void(0);"><?= strftime('%d %B, %Y', $tanggal->getTimestamp()); ?></a>
            </div>
            <h4 data-zanim-xs='{"delay":0.1}'><?= @$berita['judul_artikel']; ?></h4>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-6"> <img class="card-img-top" src="<?= base_url('public/images/artikel/') . $image_berita; ?>" alt="<?= @$berita['judul_artikel']; ?>" />
                    <div class="card-body p-5">
                        <?= @$berita['isi_artikel']; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 text-center ms-auto mt-5 mt-lg-0">
                <div class="px-2">
                    <div class="card mb-5">
                        <div class="card-body p-5">
                            <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll"><img class="rounded-circle" data-zanim-xs='{"delay":0}' src="<?= base_url('public/images/users/') . $image_pembuat; ?>" alt="<?= @$berita['nama_pembuat']; ?>" />
                                <h5 class="text-capitalize mt-3 mb-0" data-zanim-xs='{"delay":0.1}'><?= @$berita['nama_pembuat']; ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body p-5">
                            <h5>Tags</h5>
                            <ul class="nav tags mt-3 fs--1">
                                <?php foreach ($berita['tag'] as $key => $value) { ?>
                                    <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?= base_url('tag/') . $value['slug_tag']; ?>"><?= $value['nama_tag']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>