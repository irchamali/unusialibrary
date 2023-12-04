<section class="bg-100">

    <div class="container">
        <div class="text-center mb-3 mt-3">
            <h3 class="fs-2 fs-md-3"><?= $title; ?></h3>
            <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
        </div>

        <div class="card mb-6 col-md-6 mx-auto">
            <div class="card-body text-center">
                <input class="form-control" type="text" id="keyword" name="keyword" placeholder="Cari Buku">
            </div>
        </div>

        <div class="row g-4 result-book">

        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('.result-book').html('<div class="text-center"><i class="fas fa-circle-notch fa-spin fa-3x"></i></div>');

        $.ajax({
            type: "post",
            url: "<?= base_url('home/book_fetch'); ?>",
            dataType: "json",
            success: function(response) {
                setTimeout(function() {
                    $('.result-book').html(response);
                }, 1000);
            }
        });

        $('#keyword').on('keyup', function() {
            var term = $('#keyword').val().trim();
            if (term.length === 0) {
                $('.result-book .card-book').each(function() {
                    $(this).show(0);
                });
                return;
            }

            $('.result-book .card-book').each(function() {
                if ($(this).text().toLowerCase().indexOf(term.toLowerCase()) === -1) {
                    $(this).hide(0);
                } else {
                    $(this).show(0);
                }
            });
        });
    });
</script>