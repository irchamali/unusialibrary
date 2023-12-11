<!-- END ISI -->

<section class="bg-primary py-6 text-center text-md-start">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md">
                <h4 class="text-white mb-0">Mulailah membaca buku melalui Aplikasi Perpustakaan Unusia</h4>
            </div>
            <div class="col-md-auto mt-md-0 mt-4">
                <a class="btn btn-warning rounded-pill me-3" href="<?= $setting['play_store']; ?>" target="_blank">
                    <i class="fab fa-google-play"></i> Play Store
                </a>

                <a class="btn btn-warning rounded-pill" href="<?= $setting['apple_store']; ?>" target="_blank">
                    <i class="fab fa-apple"></i> Apple Store
                </a>
            </div>
        </div>
    </div>

</section>

</main>
<!-- END MAIN -->

<!-- FOOTER -->
<section style="background-color: #3D4C6F" class="contact-us">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <iframe src="<?= $setting['google_maps']; ?>" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-lg-5">
                <div class="text-white">
                    <!-- <h4 class="text-white fs-1 fs-lg-2 mt-3 mb-1">Follow Sosmed</h4> <br> -->
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="text-decoration-none d-flex align-items-center">
                                <p class="fs-0 text-white mb-0 d-inline-block">
                                    <?= $setting['alamat']; ?>
                                </p>
                            </span>
                        </li>

                        <li class="mb-2">
                            <span class="text-decoration-none d-flex align-items-center">
                                <p class="fs-0 text-white mb-0 d-inline-block">
                                    <a href="mailto:<?= $setting['email']; ?>" class="text-white"><?= $setting['email']; ?></a>
                                </p>
                            </span>
                        </li>

                        <li class="mb-2">
                            <span class="text-decoration-none d-flex align-items-center">
                                <p class="fs-0 text-white mb-0 d-inline-block">
                                    <?= $setting['no_telp']; ?>
                                </p>
                            </span>
                        </li>
                    </ul>

                    <a class="text-decoration-none me-3" href="<?= $setting['facebook'] ? $setting['facebook'] : 'Javascript:void(0);'; ?>" target="_blank">
                        <span class="brand-icon">
                            <span class="fab fa-facebook"></span>
                        </span>
                        <h5 class="fs-0 text-white mb-0 d-inline-block">Facebook</h5>
                    </a>

                    <a class="text-decoration-none me-3" href="<?= $setting['instagram'] ? $setting['instagram'] : 'Javascript:void(0);'; ?>" target="_blank">
                        <span class="brand-icon">
                            <span class="fab fa-instagram"></span>
                        </span>
                        <h5 class="fs-0 text-white mb-0 d-inline-block">Instagram</h5>
                    </a>

                    <!-- <a class="text-decoration-none me-3" href="<?= $setting['whatsapp'] ? $setting['whatsapp'] : 'Javascript:void(0);'; ?>" target="_blank">
                        <span class="brand-icon">
                            <span class="fab fa-whatsapp"></span>
                        </span>
                        <h5 class="fs-0 text-white mb-0 d-inline-block">WhatsApp</h5>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>

<footer class="footer bg-primary text-center py-4">
    <div class="container">
        <div class="row align-items-center opacity-85 text-white">
            <div class="col-sm-3 text-sm-start d-none d-sm-block">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url('public/images/') . $setting['logo_footer']; ?>" alt="<?= $setting['nama_website']; ?>" />
                </a>
            </div>
            <div class="col text-sm-end mt-3 mt-sm-0">
                <span class="fw-semi-bold">
                    <?php
                    $footer = str_replace('{{YEAR}}', date('Y'), $setting['footer']);
                    echo html_entity_decode($footer);
                    ?>
                </span>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<script src="<?= base_url('public'); ?>/vendors/popper/popper.min.js"></script>
<script src="<?= base_url('public'); ?>/vendors/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url('public'); ?>/vendors/is/is.min.js"></script>
<script src="<?= base_url('public'); ?>/vendors/bigpicture/BigPicture.js"> </script>
<script src="<?= base_url('public'); ?>/vendors/countup/countUp.umd.js"> </script>
<script src="<?= base_url('public'); ?>/vendors/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('public'); ?>/vendors/lodash/lodash.min.js"></script>
<script src="<?= base_url('public'); ?>/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url('public'); ?>/vendors/gsap/gsap.js"></script>
<script src="<?= base_url('public'); ?>/vendors/gsap/customEase.js"></script>
<script src="<?= base_url('public'); ?>/assets/js/theme.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            getKoleksiTerbaru();
        }, 1000);
    });

    function getKoleksiTerbaru() {
        $.ajax({
            type: "post",
            url: "<?= base_url('home/ajaxGetKoleksiTerbaru'); ?>",
            dataType: "json",
            success: function(response) {
                if (response != null) {
                    $('.result-koleksi-terbaru').html(response).show();
                } else {
                    $('.result-koleksi-terbaru').hide();
                }
            }
        });
    }
</script>
</body>

</html>