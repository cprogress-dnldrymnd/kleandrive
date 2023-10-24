
jQuery(document).ready(function () {
    var mySwiperPartnerThumb = new Swiper(".mySwiperPartnerThumb", {
        loop: true,
        watchSlidesProgress: true,
        slidesPerView: 1,
    });

    const mySwiperPartnernoThumb = new Swiper(".mySwiperPartnernoThumb", {
        loop: true,
        autoplay: true,
        slidesPerView: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });

    const mySwiperPartnerThumb = new Swiper(".mySwiperPartnerThumb", {
        loop: true,
        autoplay: true,
        slidesPerView: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        thumbs: {
            swiper: mySwiperPartnerThumb,
        },
    });


});