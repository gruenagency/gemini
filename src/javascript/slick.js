jQuery(document).ready(function ($) {
    $('.badge').slick({
        infinite: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        cssEase: "linear",
        autoplaySpeed: 5000,
        pauseOnHover: true,
        prevArrow: "<div type='button' class='slick-prev'></div>",
        nextArrow: "<div type='button' class='slick-next'></div>",
        responsive: [
        {
        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
        },
        },
        {
        breakpoint: 560,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        },
        },
    ],
    });
});