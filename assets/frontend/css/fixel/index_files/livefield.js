(function ($) {
    $.fn.liveField = function (options) {

        // default configuration properties
        var defaults = {
            holder: 'data-validation-placeholder'
        };

        var $item = $(this);

        var options = $.extend(defaults, options);

        $(this).each(function () {
            //$(this).attr(options.holder, $(this).val());
            $(this).focus(function () {
                if ($(this).val() == $(this).attr(options.holder)) {
                    $(this).val('');
                }
            });
            $(this).blur(function () {
                var val = '';
                try {
                    val = $(this).val().trim();
                } catch (err) {
                    val = $(this).val();
                }
                if (val == '') {
                    $(this).val($(this).attr(options.holder));
                }
            });
        });
        $(window).unload(function () {
            $item.each(function () {
                if ($(this).val() == "")
                    $(this).val($(this).attr(options.holder));
            });
        });

    }
})(jQuery);
