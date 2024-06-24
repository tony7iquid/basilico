( function( $ ) {
    var PXLTabsCarouselHandler = function( $scope, $ ) {
        var settings = $scope.find(".pxl-tabs-carousel").first().data("settings");
        $scope.find(".pxl-tabs-carousel").first().slick({
            infinite: false,
            fade: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            nextArrow: $scope.find(".pxl-swiper-arrow-next"),
            prevArrow: $scope.find(".pxl-swiper-arrow-prev"),
            autoplay: false,
            swipe: (settings["swipe"] === "true"),
            dots: (settings["dots"] === "true"),
            waitForAnimate: false,
            customPaging : function(slider, i) {
                return '<span class="pxl-swiper-pagination-bullet ' + settings['dots_style'] + '"></span>';
            },
        });
        $(".pxl-tabs-carousel").on("beforeChange", function (){
            alert('hjkadhfkjjdfk');
        });
    };
    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_tabs_carousel.default', PXLTabsCarouselHandler );
    } );
} )( jQuery );