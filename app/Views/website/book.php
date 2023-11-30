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


        <?php if (count($koleksi_buku) > 0) { ?>
            <div class="row g-4 result-book">
                <?php foreach ($koleksi_buku as $key => $value) { ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="card">
                            <a href="<?= $value['book_url']; ?>" target="_blank">
                                <img class="card-img-top" src="<?= $value['book_cover']; ?>" alt="<?= $value['book_title']; ?>" />
                            </a>
                            <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="<?= $value['book_url']; ?>" target="_blank">
                                        <h5 data-zanim-xs='{"delay":0}'><?= $value['book_title']; ?></h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <h6 class="text-500" data-zanim-xs='{"delay":0.1}'><?= $value['penulis']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Buku sedang tidak tersedia</span></div>
        <?php }; ?>
    </div>

</section>

<script>
    const koleksi_buku = JSON.parse('<?= json_encode($koleksi_buku); ?>');
    const search = document.getElementsByName("keyword")[0];
    const data_section = document.getElementsByClassName("result-book")[0];

    $("#keyword").on("keyup", function() {
        const search_value = $(this).val().toLowerCase();
        data_section.innerHTML = "";
        $.each(koleksi_buku, function(i, v) {
            if (v.book_title.toLowerCase().includes(search_value) || v.penulis.toLowerCase().includes(search_value)) {
                data_section.innerHTML += '<div class="col-md-4 col-lg-3"><div class="card"><a href="' + v.book_url + '" target="_blank"><img class="card-img-top" src="' + v.book_cover + '" alt="' + v.book_title + '" /></a><div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll"><div class="overflow-hidden"><a href="' + v.book_url + '" target="_blank"><h5 data-zanim-xs="{"delay":0}">' + v.book_title + '</h5></a></div><div class="overflow-hidden"><h6 class="text-500" data-zanim-xs="{"delay":0.1}">' + v.penulis + '</h6></div></div></div></div>';
            }
        });
    });
</script>