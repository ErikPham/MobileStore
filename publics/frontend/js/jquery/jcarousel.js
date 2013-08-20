function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
}
;

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
    var itemImg = $('#mycarousel').find('li');
    itemImg.first().addClass('selected');

    itemImg.on('click', function() {
        itemImg.removeClass('selected');
        $(this).addClass('selected');
        var img = $(this).children('img').attr('src');
        $('.fixcenter').children().attr('src', img);
    });
});