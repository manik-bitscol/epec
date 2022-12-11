(function ($) {
    $(document).ready(function () {
        $(".slides").lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 8,
        });

        $("#bathroom-range").val(null);
        $("#bedroom-range").val(null);
    });

    $("#grid-active-btn").click(function () {
        $("#list").addClass("d-none");
        $("#grid").removeClass("d-none");
        $("#controls-1").removeClass("d-none");
        $("#controls-2").addClass("d-none");
    });
    $("#list-active-btn").click(function () {
        $("#grid").addClass("d-none");
        $("#list").removeClass("d-none");
        $("#controls-1").addClass("d-none");
        $("#controls-2").removeClass("d-none");
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $(".nav-bar").addClass("sticky-top");
        } else {
            $(".nav-bar").removeClass("sticky-top");
        }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>',
        ],
    });
    // Aminities Carousel
    $(".client-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 4,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>',
        ],
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>',
        ],
    });
    // Award carousel
    $(".award-carousel").owlCarousel({
        autoplay: true,
        items: 8,
        smartSpeed: 1000,
        margin: 10,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>',
        ],
        responsive: {
            576: {
                items: 4,
            },
            992: {
                items: 8,
            },
            1080: {
                items: 8,
            },
        },
    });
    // Team Carousel
    $(".team-carousel").owlCarousel({
        autoplay: true,
        items: 6,
        smartSpeed: 1000,
        margin: 10,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>',
        ],
        responsive: {
            576: {
                items: 4,
            },
            992: {
                items: 6,
            },
            1080: {
                items: 6,
            },
        },
    });

    // Testimonials carousel
    $(".video-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            992: {
                items: 1,
            },
        },
    });
})(jQuery);
