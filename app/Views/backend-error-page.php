<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-ban"></i>
            <h3 class="box-title">
                <?php
                if (empty($title)) {
                    echo 'Oops...';
                } else {
                    echo $title;
                }
                ?>
            </h3>
        </div>

        <div class="box-body">
            <?php
            if (!empty($msg)) {
                show_message($msg);
            }
            ?>
        </div>
    </div>
</section>