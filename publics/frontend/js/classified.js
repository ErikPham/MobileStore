var url = "http://mobilestore.com/";
$(function() {
    //filter post classified
    $('.filter').hover(function() {
        $(this).children('.filter-list-wrapper').addClass('on-hover');
    }, function() {
        $(this).children('.filter-list-wrapper').removeClass('on-hover');
    });

    $('.filter-list').on("click", "li:not(.checked)", function(event) {
        event.preventDefault();
        $(".checked", event.delegateTarget).removeClass("checked");
        $(this).addClass('checked');
        loadClassified(0, 1);
        loadClassified(1, 1);
        loadClassified(2, 1);
    });

    loadLocation();
    loadClassified(0, 1);
    loadClassified(1, 1);
    loadClassified(2, 1);
});
function loadClassified(dataType, dataPage) {
    var price = $('.by-price').find('.checked').attr('data-price');
    var city = $('.by-city').find('.checked').attr('data-city');
    var time = $('.by-time').find('.checked').attr('data-time');

    if (typeof city === 'undefined') {
        city = 0;
    }
    if (typeof dataPage === 'undefined') {
        dataPage = 1;
    }
    $.post(url + 'Classified/xhrList', {price: price, city: city, time: time, page: dataPage, type: dataType}, function(data) {
        var selector = '';
        if (dataType === 1) {
            selector = '#tab-buy';
        } else if (dataType === 2) {
            selector = '#tab-sale';
        } else {
            selector = '#tab-all-product';
        }
        $(selector).html(data);
    });
}

function loadLocation() {
    $.getJSON(url + 'Classified/getLocaltion', function(data) {
        var city = '';
        $.each(data, function(i, item) {
            city += '<li data-city="' + item.id + '"><a href="#">' + item.label + '</a></li>';
        });
        $('#list-city').html(city);
        $('#list-city li').first().addClass('checked');
    });
}
