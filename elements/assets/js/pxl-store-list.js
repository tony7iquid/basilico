( function( $ ) {
    var PXLStoreListHander = function( $scope, $ ) {
        
    };
    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_store_list.default', PXLStoreListHander );
    } );
} )( jQuery );