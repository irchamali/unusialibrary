<section style="background-color: #3D4C6F">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="bg-primary text-white p-5 p-lg-6 rounded-3">
                    <h5 class="text-white fs-1 fs-lg-1 mb-1 text-center">Start reading e-book via Unusia library Apps!</h5>
                    <!-- <p class="text-white">Let's Go!</p> -->
                    <div class="mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-6 pe-md-0">
                                <div class="d-grid">
                                    <a href="https://play.google.com/store/apps/details?id=id.kubuku.kbk755360d" class="btn btn-warning btn-sm" target="_blank">
                                        <span class="text-primary fw-semi-bold">
                                            <i class="fab fa-google-play"></i> Play Store
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <div class="d-grid">
                                    <a href="https://apps.apple.com/id/app/perpustakaan-univ-nu-indonesia/id6468444123" class="btn btn-warning btn-sm" target="_blank">
                                        <span class="text-primary fw-semi-bold">
                                            <i class="fab fa-apple"></i> Apple Store
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 mt-4 mt-lg-0">
                <div class="row">
                    <div class="col-7 col-lg-6 text-white ms-lg-auto">
                        <ul class="list-unstyled">
                            <li class="mb-3"><span class="text-white fs-1 fs-lg-2 mb-1">Link Terkait</span></li>
                            <li class="mb-3"><a class="text-white" href="<?= base_url('sejarah'); ?>">Profil</a></li>
                            <li class="mb-3"><a class="text-white" href="">Kontak Kami</a></li>
                            <li class="mb-3"><a class="text-white" href="<?= $settingLibrary['peminjaman_buku']; ?>" target="_blank">Layanan Peminjaman Buku</a></li>
                        </ul>
                    </div>
                    <div class="col-5 col-sm-5 ms-sm-auto">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a class="text-decoration-none d-flex align-items-center" href="mailto:<?= $settingMediaSosial['email']; ?>" target="_blank">
                                    <span class="brand-icon me-3"><span class="fas fa-envelope"></span></span>
                                    <h5 class="fs-0 text-white mb-0 d-inline-block">Email</h5>
                                </a>
                            </li>

                            <li class="mb-2">
                                <a class="text-decoration-none d-flex align-items-center" href="<?= $settingMediaSosial['facebook']; ?>" target="_blank">
                                    <span class="brand-icon me-3"><span class="fab fa-facebook"></span></span>
                                    <h5 class="fs-0 text-white mb-0 d-inline-block">Facebook</h5>
                                </a>
                            </li>

                            <li class="mb-2">
                                <a class="text-decoration-none d-flex align-items-center" href="<?= $settingMediaSosial['instagram']; ?>" target="_blank">
                                    <span class="brand-icon me-3"><span class="fab fa-instagram"></span></span>
                                    <h5 class="fs-0 text-white mb-0 d-inline-block">Instagram</h5>
                                </a>
                            </li>

                            <li class="mb-2">
                                <a class="text-decoration-none d-flex align-items-center" href="<?= $settingMediaSosial['whatsapp']; ?>" target="_blank">
                                    <span class="brand-icon me-3"><span class="fab fa-whatsapp"></span></span>
                                    <h5 class="fs-0 text-white mb-0 d-inline-block">WhatsApp</h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<footer class="footer bg-primary text-center py-4">
    <div class="container">
        <div class="row align-items-center opacity-85 text-white">
            <div class="col-sm-3 text-sm-start">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url('public') ?>/assets/img/unulib-light.png" alt="logo" />
                </a>
            </div>

            <div class="col text-sm-end mt-3 mt-sm-0">
                <span class="fw-semi-bold">
                    <?php
                    $footer = str_replace('{{YEAR}}', date('Y'), $settingApp['footer']);
                    echo html_entity_decode($footer);
                    ?>
                </span>
            </div>
        </div>
    </div>
</footer>

<script src="<?= base_url('public') . '/vendors/popper/popper.min.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/bootstrap/bootstrap.min.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/is/is.min.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/bigpicture/BigPicture.js?r=' . time(); ?>"> </script>
<script src="<?= base_url('public') . '/vendors/countup/countUp.umd.js?r=' . time(); ?>"> </script>
<script src="<?= base_url('public') . '/vendors/swiper/swiper-bundle.min.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/fontawesome/all.min.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/lodash/lodash.min.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/imagesloaded/imagesloaded.pkgd.min.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/gsap/gsap.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/vendors/gsap/customEase.js?r=' . time(); ?>"></script>
<script src="<?= base_url('public') . '/assets/js/theme.js?r=' . time(); ?>"></script>

</body>

</html>