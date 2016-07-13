/*
* flashMe.js
* version 1.0
* */
(function ($) {
    $.fn.flashMe = function (options) {
        var settings = $.extend({

            /*
             * colors can either be false, surprise or an array of colors. this defines how the color attribute is flashed
             * */
            colors: "surprise",

            /*
             * can be false, surprise or an array. this defines how the background-color attribute is flashed
             * */
            backgroundColors: false,

            /*
             * the interval in which to flash at in milliseconds
             * */
            interval: 1000,

            /*
             * can be false or the speed in which to transition in milliseconds
             * */
            transition: false,
        }, options);

        /*
         * set el as this. to be used in the interval call
         * */
        var el = this;

        /*
         * start the interval
         * */
        setInterval(function () {

            /*
             * are we flashing some colors?
             * */
            if (settings.colors !== false) {
                if (settings.colors == "surprise") {

                    /*
                     * default setting surprise.
                     * generates a random color to flash with.
                     * */
                    c = "#" + ((1 << 24) * Math.random() | 0).toString(16);
                } else if (Array.isArray(settings.colors)) {

                    /*
                     * if user defined array of colors. flash with those.
                     * */
                    c = settings.colors[Math.floor(Math.random() * settings.colors.length)];
                } else {

                    /*
                     * if ya dont know. go random!
                     * */
                    c = "#" + ((1 << 24) * Math.random() | 0).toString(16);
                }

                /*
                 * set the color attribute
                 * */
                el.css("color", c);

                /*
                 * check if we need to apply transition TODO cross browser
                 * */
                if (settings.transition !== false) {
                    el.css("transition", "color " + settings.transition + "ms linear");
                }
            }

            /*
             * are we flashing some background colors?
             * */
            if (settings.backgroundColors !== false) {
                if (settings.backgroundColors == "surprise") {

                    /*
                     * default setting surprise.
                     * generates a random color to flash with.
                     * */
                    bc = "#" + ((1 << 24) * Math.random() | 0).toString(16);
                } else if (Array.isArray(settings.backgroundColors)) {

                    /*
                     * if user defined array of colors. flash with those.
                     * */
                    bc = settings.backgroundColors[Math.floor(Math.random() * settings.backgroundColors.length)];
                } else {

                    /*
                     * if ya dont know. go random!
                     * */
                    bc = "#" + ((1 << 24) * Math.random() | 0).toString(16);
                }

                /*
                 * set the background-color attribute
                 * */
                el.css("background-color", bc);

                /*
                 * check if we need to apply transition TODO cross browser
                 * */
                if (settings.transition !== false) {
                    el.css("transition", "background-color " + settings.transition + "ms linear");
                }
            }
        }, settings.interval);
    };
}(jQuery));