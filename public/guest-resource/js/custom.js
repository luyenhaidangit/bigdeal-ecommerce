(function ($) {
    "use strict";
    /*=====================
     01. Slick slider
     ==========================*/

    jQuery(".bg-img-contain").each(function () {
        var el = $(this),
            src = el.attr("src"),
            parent = el.parent();

        parent.css({
            "background-image": "url(" + src + ")",
            "background-size": "contain",
            "background-repeat": "no-repeat",
            "background-position": "center",
            display: "block",
        });

        el.hide();
    });
})(jQuery);
