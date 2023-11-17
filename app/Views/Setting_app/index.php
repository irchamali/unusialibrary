<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $title; ?></h3>
        </div>

        <div class="box-body">
            <form action="" method="post" id="form-setting-app">
                <div class="form-group">
                    <label for="judul_web">Judul Web</label>
                    <input type="text" class="form-control" name="judul_web" id="judul_web" value="<?= @$judul_web; ?>">
                </div>

                <div class="form-group">
                    <label for="deskripsi_web">Deskripsi Web</label>
                    <textarea class="form-control" name="deskripsi_web" id="deskripsi_web"><?= @$deskripsi_web; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="footer_web">Footer Web</label>
                    <textarea class="form-control" name="footer_web" id="footer_web"><?= @$footer_web; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Font Family</label>
                            <?= form_dropdown(['name' => 'font_family', 'id' => 'font', 'class' => 'form-control'], ['open-sans' => 'Open Sans (Default)', 'arial' => 'Arial', 'montserrat' => 'Montserrat', 'poppins' => 'Poppins', 'roboto' => 'Roboto', 'verdana' => 'Verdana'], set_value('font_family', @$font_family)) ?>
                        </div>

                        <div class="form-group">
                            <label>Font Size</label>
                            <div class="range-slider-test">
                                <?php
                                $value_font_size = @$font_size ? $font_size : @$_POST['font_size'];
                                ?>
                                <input class="range-slider" id="font-size" type="range" step="0.5" name="font_size" id="font-size" value="<?= $value_font_size ?>" min="10" max="18">
                                <?php
                                $left_output = (($value_font_size - 10) * 33);
                                ?>
                                <output for="font-size" style="left:<?= $left_output ?>px"><?= $value_font_size ?></output>px
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-skin">
                            <label>Theme Skin</label>
                            <ul class="list-unstyled clearfix">
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin">Blue</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin">Black</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin">Purple</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin">Green</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin">Red</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin">Yellow</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin" style="font-size: 12px">Blue Light</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin" style="font-size: 12px">Black Light</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin" style="font-size: 12px">Purple Light</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin" style="font-size: 12px">Green Light</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin" style="font-size: 12px">Red Light</p>
                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="javascript:void(0)" data-theme="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                        <div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                                        <div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>
                                    </a>
                                    <p class="text-center no-margin" style="font-size: 12px">Yellow Light</p>
                                </li>
                            </ul>
                            <input type="hidden" name="theme_skin" id="theme_skin" value="<?= @$theme_skin; ?>">
                        </div>
                    </div>
                </div>

                <?= button_submit($settingAppLayout['button']); ?>
            </form>
        </div>
    </div>
</section>