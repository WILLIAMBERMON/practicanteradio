/* Write here your custom javascript codes */

            jQuery(document).ready(function () {
                App.init();
                new WOW().init();
                OwlCarousel.initOwlCarousel();
                LayerSlider.initLayerSlider();
                OwlRecentWorks.initOwlRecentWorksV2();
            });


$(document).ready(function() {
    var pgwSlider = $('.pgwSlider').pgwSlider();
    pgwSlider.reload({
    maxHeight : 600,
    intervalDuration : 8000,
    adaptiveHeight : true,
    verticalCentering : true,
//    displayControls : true,
    transitionEffect : 'sliding'
});
});


       /*     $(function () {
                $(window).scroll(function () {
                    if (screen.width > 991 && $(window).scrollTop() > 230)
                    {
                      $("#menu-principal").fadeOut();
                    }
                    else
                    {
                      $("#menu-principal").fadeIn();
                    }
                });
            }); */


var LayerSlider = function () {

    return {
        //Layer Slider
        initLayerSlider: function () {
            $(document).ready(function(){
                jQuery("#layerslider").layerSlider({
                    skin: 'fullwidth',
                    navPrevNext: false,
                    navStartStop: false,
                    responsive : true,
                    responsiveUnder : 960,
                    layersContainer : 960,
                    skinsPath: 'assets/plugins/layer-slider/layerslider/skins/'
                });
            });
        }

    };
}();


/*
 Plugin: jQuery Parallax
 Version 1.1.3
 Author: Ian Lunn
 Twitter: @IanLunn
 Author URL: http://www.ianlunn.co.uk/
 Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

 Dual licensed under the MIT and GPL licenses:
 http://www.opensource.org/licenses/mit-license.php
 http://www.gnu.org/licenses/gpl.html
 */

(function( $ ){
    var $window = $(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });


    $.fn.parallax = function(xpos, speedFactor, outerHeight) {
        var $this = $(this);
        var getHeight;
        var firstTop;
        var paddingTop = 0;

        //get the starting position of each element to have parallax applied to it
        $this.each(function(){
            firstTop = $this.offset().top;
        });

        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }

        // setup defaults if arguments aren't specified
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;

        // function to be called whenever the window is scrolled or resized
        function update(){
            var pos = $window.scrollTop();

            $this.each(function(){
                var $element = $(this);
                var top = $element.offset().top;
                var height = getHeight($element);

                // Check if totally above or totally below viewport
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }

                $this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
            });
        }

        $window.bind('scroll', update).resize(update);
        update();
    };
})(jQuery);
