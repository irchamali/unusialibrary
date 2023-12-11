<section class="bg-100">

    <div class="container">
        <div class="text-center mb-3 mt-3">
            <h3 class="fs-2 fs-md-3"><?= $title; ?></h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>

        <div class="mb-3 mt-6">
            <h3 class="fs-2 fs-md-3 line-short">Yang populer di antara koleksi kami</h3>
            <small>Koleksi-koleksi kami yang dibaca oleh banyak pengunjung perpustakaan. Cari. Pinjam. Kami harap Anda menyukainya</small>
        </div>

        <div class="col-md-auto mt-md-0 mt-4 mb-3 result-subject-popular"></div>
        <div class="row g-4 mt-3 result-biblio-popular"></div>

        <div class="mb-3 mt-6">
            <h3 class="fs-2 fs-md-3 line-short">Koleksi baru dan diperbarui</h3>
            <small>Merupakan daftar koleksi-koleksi terbaru kami. Tidak semuanya baru, adapula koleksi yang data-datanya sudah diperbaiki. Selamat menikmati</small>
        </div>

        <div class="col-md-auto mt-md-0 mt-4 mb-3 result-subject-latest"></div>
        <div class="row g-4 mt-3 result-biblio-latest"></div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('.result-subject-popular').html('<div class="text-center"><i class="fas fa-circle-notch fa-spin fa-3x"></i></div>');
        $('.result-subject-latest').html('<div class="text-center"><i class="fas fa-circle-notch fa-spin fa-3x"></i></div>');

        $.ajax({
            type: "post",
            url: "<?= base_url('home/book_print_subject_popular'); ?>",
            dataType: "json",
            success: function(response) {
                setTimeout(function() {
                    $('.result-subject-popular').html(response);

                    $.ajax({
                        type: "post",
                        url: "<?= base_url('home/book_print_subject_latest'); ?>",
                        dataType: "json",
                        success: function(response) {
                            $('.result-subject-latest').html(response);
                        }
                    });
                }, 1000);
            }
        });


        $.ajax({
            type: "post",
            url: "<?= base_url('home/book_print_biblio_popular'); ?>",
            dataType: "json",
            success: function(response) {
                setTimeout(function() {
                    $('.result-biblio-popular').html(response);

                    $.ajax({
                        type: "post",
                        url: "<?= base_url('home/book_print_biblio_latest'); ?>",
                        dataType: "json",
                        success: function(response) {
                            $('.result-biblio-latest').html(response);
                        }
                    });
                }, 1000);

            }
        });
    });
</script>