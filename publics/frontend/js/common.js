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
    $('#cart > .heading a').live('click', function() {
        $('#cart').addClass('active');

        $('#cart').load('index.php?route=module/cart #cart > *');

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
});