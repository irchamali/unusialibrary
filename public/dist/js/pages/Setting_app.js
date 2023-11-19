$(function() {
    var classButton;

    $('.list-unstyled [data-theme]').on('click', function(e) {
        e.preventDefault();
        var dataTheme = $(this).data('theme');
        $('body').removeClass(themeSkin);
        $('body').addClass(dataTheme);
        $('#theme_skin').val(dataTheme);
        $('#button-submit').removeClass();
        $('#button-submit').toggleClass('btn ' + switchSkin(dataTheme));
        themeSkin = dataTheme;

        switchSkin(dataTheme);
        $.ajax({
            type: "POST",
            url: currentURL + '/ajaxSwicthSkin',
            data: {
                theme_skin: dataTheme,
                button: switchSkin(dataTheme),
            },
            success: function (response) {
                console.log(response);
            },
            error: function(xhr) {
                alert(xhr.responseText);
            }
        });
    });

    $('.range-slider').on('input', function() {
        $('body').css('font-size', $(this).val() + 'px');
        $output = $(this).next("output");
        box = $output.width() / 2;

        var init = 25;
        var current = (($(this).val() - 10) * 33) - box;
        var range_top = 22 + $(this).position().top;

        $(this).next("output").css({
            left: current + init,
            top: range_top
        }).text($(this).val());
    });

    $('#font').on('change', function() {
        url = baseURL + 'public/bower_components/fonts/' + $(this).val() + '.css';
        $('#stylesheet-font-family').attr('href', url);
        $('#font').val($(this).val());
    });

    $('#font-size').on('change', function() {
        $('body').css('font-size', $(this).val());
    });

    $('#form-setting-app').on('submit', function(e) {
        e.preventDefault();
        $button = $(this).find('button[type="submit"]').prop('disabled', true);
        $button.prepend('<i class="fas fa-circle-notch fa-spin"></i>');
        $.ajax({
            type: "POST",
            url: moduleURL,
            data: $(this).serialize() + '&submit=submit',
            success: function(response) {
                $button.prop('disabled', false).find('i').remove();
            },
            error: function(xhr) {
                $bootbox.modal('hide');
                alert(xhr.responseText);
            }
        });
    });
});