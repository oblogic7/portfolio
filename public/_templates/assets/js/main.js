// @codekit-prepend "vendor/scrollit.min.js"
// @codekit-prepend "vendor/bootstrap.min.js"
// @codekit-prepend "vendor/handlebars.js"
// @codekit-prepend "vendor/jquery.collagePlus.min.js"

/*=============================================
 Module Pattern
 @Matt Snyder- 2013
 =============================================*/

var OBSCURELOGIC = (function () {

    /*========== Alias to settings ==========*/
    var s;

    return {

        /*========== Settings ==========*/
        settings: {
            document: $(document)
        },

        /*========== Table of Contents ==========*/
        init: function () {
            s = this.settings;
            this._InitScrollIt();
            this._InitScrollLink();
            this.portfolio.init();
            this._InitCollage();
            this._CollageWindowResizeListener();
            this._ScrollNoticeListener();
        },

        _ScrollNoticeListener: function() {
            $('#portfolio .wrapper').on('scroll', function() {
                $('.scroll-arrow').fadeOut();
            })
        },

        _CollageWindowResizeListener: function() {
            var resizeTimer = null;
            $(window).bind('resize', function() {

                $('#photography .wrapper img').css("opacity", 0);

                if (resizeTimer) clearTimeout(resizeTimer);
                resizeTimer = setTimeout(OBSCURELOGIC._InitCollage(), 200);
            });
        },

        _InitCollage: function() {
            $('#photography .wrapper').collagePlus({
                'targetHeight'    : 200
            });

        },

        _InitScrollIt: function () {
            $.scrollIt();
        },

        _InitScrollLink: function () {
            $(document).scroll(function () {

                if ($(document).scrollTop() > 215) {
                    $('.top-link').addClass('visible');
                } else {
                    $('.top-link').removeClass('visible');
                }

            });
        },

        portfolio: {
            init: function () {
                this._ThumbnailClick();
            },

            _ThumbnailClick: function () {

                $('.portfolio-thumb').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                });

                $('.portfolio-thumb').on('click', 'a:not(.selected)', function (e) {

                    $('.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var url = $(this).attr('href');
                    $.get(url, null, function (response) {
                        OBSCURELOGIC.portfolio._DisplayItem(response);
                    }, 'json')
                })
            },

            _DisplayItem: function (item) {
                var container = $('#portfolio-item .container');

                $(container).stop(true).slideUp('300', function () {

                    var source = $("#portfolio-item-template").html();
                    var template = Handlebars.compile(source);
                    var html = template({item: item});
                    console.log(item);

                    $(this).html(html);

                $(container).slideDown();

                });

            }
        }
    };

})();


/*========== Kick Start ==========*/
(function () {
    OBSCURELOGIC.init();
})();