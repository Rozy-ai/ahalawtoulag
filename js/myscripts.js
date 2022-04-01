jQuery(document).ready(function() {
    
wow = new WOW({
        boxClass: 'move',
        animateClass: 'animated',
        offset: 100
    })
    wow.init();



    Layout.init();

    //contact us
    $("#contact-form,#insurance-form").on("beforeSubmit", function(e){
        e.preventDefault();

        var form = $(this);

        var loadingText = '<i class="fa fa-spinner fa-spin"></i>';
        $('#send-btn').html($('#send-btn').text()+' '+loadingText);
        $('#send-btn').prop('disabled',true);

        $.ajax({
            url: form.attr('action'),
            method: "POST",
            data: form.serialize(),
            type: "json",
            success: function (result) {
                console.log(result);
                if (result.status) {
                    swal({
                        title: $('.breadcrumb > li:last-child').text(),
                        text: result.message,
                        type: result.status,
                        showCloseButton: true,
                        showConfirmButton: false,
                        timer: 5000
                        //confirmButtonText: 'OK'
                    });
                    $(form).trigger("reset"); //очистка формы
                    $('#send-btn').text($('#send-btn').data('mytext'));
                    $('#send-btn').prop('disabled',false);
                }
            }
        });

        return false;
    });

    var bigimage = $("#big");
    var thumbs = $("#thumbs");
    //var totalslides = 10;
    var syncedSecondary = true;

    bigimage
        .owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
            ]
        })
        .on("changed.owl.carousel", syncPosition);

    thumbs
        .on("initialized.owl.carousel", function() {
            thumbs
                .find(".owl-item")
                .eq(0)
                .addClass("current");
        })
        .owlCarousel({
            items: 4,
            dots: false,
            nav: false,
            /*navText: [
                '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
            ],*/
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 4,
            responsiveRefreshRate: 100
        })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        //if loop is set to false, then you have to uncomment the next line
        //var current = el.item.index;

        //to disable loop, comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        //to this
        thumbs
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = thumbs.find(".owl-item.active").length - 1;
        var start = thumbs
            .find(".owl-item.active")
            .first()
            .index();
        var end = thumbs
            .find(".owl-item.active")
            .last()
            .index();

        if (current > end) {
            thumbs.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
            thumbs.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            bigimage.data("owl.carousel").to(number, 100, true);
        }
    }

    thumbs.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });

    jQuery(document).on("click", ".slick-arrow-custom", function(e) {
        e.preventDefault();
        var action = $(this).data('hereket');
        if(action=="cep"){
            $("#slick-div").slick('slickPrev');
        }
        else{
            $("#slick-div").slick('slickNext');
        }
    });

    jssor_1_slider_init = function() {
        var jssor_1_options = {
            $AutoPlay: 1,
            // $SlideWidth: 600,
            // $ArrowNavigatorOptions: {
                // $Class: $JssorArrowNavigator$
            // },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        var MAX_WIDTH = 1120;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);

    };
    //run slider

    if ($("#jssor_1").length > 0) {
        jssor_1_slider_init();
    }

    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top-100
                    }, 300, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

  $(".animate_link_1").mouseover(
    function() {
      $('span.add_1').addClass('linesmart')
});
  $(".animate_link_1").mouseleave(
    function() {
      $('span.add_1').removeClass('linesmart')
});

   $(".animate_link_2").mouseover(
    function() {
      $('span.add_2').addClass('linesmart')
});
  $(".animate_link_2").mouseleave(
    function() {
      $('span.add_2').removeClass('linesmart')
});

   $(".animate_link_3").mouseover(
    function() {
      $('span.add_3').addClass('linesmart')
});
  $(".animate_link_3").mouseleave(
    function() {
      $('span.add_3').removeClass('linesmart')
});

   $(".animate_link_4").mouseover(
    function() {
      $('span.add_4').addClass('linesmart')
});
  $(".animate_link_4").mouseleave(
    function() {
      $('span.add_4').removeClass('linesmart')
});


   $(".animate_link_5").mouseover(
    function() {
      $('span.add_5').addClass('linesmart')
});
  $(".animate_link_5").mouseleave(
    function() {
      $('span.add_5').removeClass('linesmart')
});


});







