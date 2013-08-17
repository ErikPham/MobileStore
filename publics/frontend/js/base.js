var url = "http://localhost/mobilestore/";
$(document).ready(function() {

    /* Search */
    $('.button-search').bind('click', function() {
        url = $('base').attr('href') + 'index.php?route=product/search';

        var search = $('input[name=\'search\']').attr('value');

        if (search) {
            url += '&search=' + encodeURIComponent(search);
        }

        location = url;
    });

    $('#header input[name=\'search\']').bind('keydown', function(e) {
        if (e.keyCode == 13) {
            url = $('base').attr('href') + 'index.php?route=product/search';

            var search = $('input[name=\'search\']').attr('value');

            if (search) {
                url += '&search=' + encodeURIComponent(search);
            }

            location = url;
        }
    });

    /* Ajax Cart */
    function notification(type, notice) {
        $('#notification').html('<div class="' + type + '" style="display: none;">' + notice + '<img src="publics/frontend/images/close.png" alt="" class="close" /></div>');
        $('.' + type + '').fadeIn('slow');
        $('html, body').animate({scrollTop: 0}, 'slow');
    }
    $.getJSON(url + 'CheckOut/xhrTotal', function(json) {
        total = json['quantity'] + ' sản phẩm ' + json['total'] + ' vnđ';
        $('#cart-total').text(total);
    });
    $('.cart').click(function(e) {
        e.preventDefault();
        id = $(this).find('a').attr('id');
        quantiy = 1;
        $.ajax({
            type: "POST",
            url: url + "CheckOut/xhrAdd",
            data: {id: id, qty: quantiy},
            success: function(json) {
                if (json['success']) {
                    notification('success', json['success']);
                    $('#cart-total').html(json['total']);
                } else if (json['error']) {
                    notification('error', json['error']);
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }
            },
            dataType: 'json'
        });
    });

    $('#cart > .heading a').live('click', function() {
        $('#cart').addClass('active');
        $('#cart').load(url + 'CheckOut/xhrCart');
        $('#cart').live('mouseleave', function() {
            $(this).removeClass('active');
        });
    });

    /* Mega Menu */
    $('#menu ul > li > a + div').each(function(index, element) {
        // IE6 & IE7 Fixes
        if ($.browser.msie && ($.browser.version == 7 || $.browser.version == 6)) {
            var category = $(element).find('a');
            var columns = $(element).find('ul').length;

            $(element).css('width', (columns * 143) + 'px');
            $(element).find('ul').css('float', 'left');
        }

        var menu = $('#menu').offset();
        var dropdown = $(this).parent().offset();

        i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());

        if (i > 0) {
            $(this).css('margin-left', '-' + (i + 5) + 'px');
        }
    });

    // IE6 & IE7 Fixes
    if ($.browser.msie) {
        if ($.browser.version <= 6) {
            $('#column-left + #column-right + #content, #column-left + #content').css('margin-left', '195px');

            $('#column-right + #content').css('margin-right', '195px');

            $('.box-category ul li a.active + ul').css('display', 'block');
        }

        if ($.browser.version <= 7) {
            $('#menu > ul > li').bind('mouseover', function() {
                $(this).addClass('active');
            });

            $('#menu > ul > li').bind('mouseout', function() {
                $(this).removeClass('active');
            });
        }
    }

    $('.success img, .warning img, .attention img, .information img').live('click', function() {
        $(this).parent().fadeOut('slow', function() {
            $(this).remove();
        });
    });


    //slider
    $('#pavcontentslider').carousel({interval: 8000, auto: true, pause: 'hover'});
    $('#productcarousel1,#productcarousel2,#productcarousel3').carousel({interval: false, auto: false, pause: 'hover'});


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

function getURLVar(key) {
    var value = [];

    var query = String(document.location).split('?');

    if (query[1]) {
        var part = query[1].split('&');

        for (i = 0; i < part.length; i++) {
            var data = part[i].split('=');

            if (data[0] && data[1]) {
                value[data[0]] = data[1];
            }
        }

        if (value[key]) {
            return value[key];
        } else {
            return '';
        }
    }
}

function addToCart(product_id, quantity) {
    quantity = typeof(quantity) !== 'undefined' ? quantity : 1;

    $.ajax({
        url: 'index.php?route=checkout/cart/add',
        type: 'post',
        data: 'product_id=' + product_id + '&quantity=' + quantity,
        dataType: 'json',
        success: function(json) {
            $('.success, .warning, .attention, .information, .error').remove();

            if (json['redirect']) {
                location = json['redirect'];
            }

            if (json['success']) {
                $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');

                $('.success').fadeIn('slow');

                $('#cart-total').html(json['total']);

                $('html, body').animate({scrollTop: 0}, 'slow');
            }
        }
    });
}
function addToWishList(product_id) {
    $.ajax({
        url: 'index.php?route=account/wishlist/add',
        type: 'post',
        data: 'product_id=' + product_id,
        dataType: 'json',
        success: function(json) {
            $('.success, .warning, .attention, .information').remove();

            if (json['success']) {
                $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');

                $('.success').fadeIn('slow');

                $('#wishlist-total').html(json['total']);

                $('html, body').animate({scrollTop: 0}, 'slow');
            }
        }
    });
}

function addToCompare(product_id) {
    $.ajax({
        url: 'index.php?route=product/compare/add',
        type: 'post',
        data: 'product_id=' + product_id,
        dataType: 'json',
        success: function(json) {
            $('.success, .warning, .attention, .information').remove();

            if (json['success']) {
                $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');

                $('.success').fadeIn('slow');

                $('#compare-total').html(json['total']);

                $('html, body').animate({scrollTop: 0}, 'slow');
            }
        }
    });
}