"use strict";
//Wrapping all JavaScript code into a IIFE function for prevent global variables creation
(function($){

var $body = $('body');
var $window = $(window);
            // Add isotope click function
                $(".gallery-filters a").on('click', function () {
                    $(".gallery-filters a").removeClass("active");
                    $(this).addClass("active");
                });
    // init Isotope
    $('.isotope-wrapper').each(function(index) {
        var $container = $(this);
        var layoutMode = ($container.hasClass('masonry-layout')) ? 'masonry' : 'fitRows';
        var columnWidth = ($container.children('.col-md-4').length) ? '.col-md-4' : false;
        $container.isotope({
            percentPosition: true,
            layoutMode: layoutMode,
            masonry: {
                //TODO for big first element in grid - giving smaller element to use as grid
                // columnWidth: '.isotope-wrapper > .col-md-4'
                columnWidth: columnWidth
            }
        });

        var $filters = $container.attr('data-filters') ? $($container.attr('data-filters')) : $container.prev().find('.filters');
        // bind filter click
        if ($filters.length) {
            $filters.on( 'click', 'a', function( e ) {
                e.preventDefault();
                var $thisA = $(this);
                var filterValue = $thisA.attr('data-filter');
                $container.isotope({ filter: filterValue });
                // $thisA.siblings().removeClass('selected active');
                // $thisA.addClass('selected active');
            });
            //for works on select
            $filters.on( 'change', 'select', function( e ) {
                e.preventDefault();
                var filterValue = $(this).val();
                $container.isotope({ filter: filterValue });
            });
        }
    });

//end of IIFE function
})(jQuery);

