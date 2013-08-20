$(function() {
    $(".royalSlider").royalSlider({
        fullscreen: {
            enabled: true,
            nativeFS: true
        },
        controlNavigation: 'thumbnails',
        autoScaleSlider: true,
        //autoScaleSliderWidth: 740,
        //autoScaleSliderHeight: 650,
        loop: false,
        numImagesToPreload: 4,
        arrowsNavAutohide: true,
        arrowsNavHideOnTouch: true,
        keyboardNavEnabled: true
    });
})
