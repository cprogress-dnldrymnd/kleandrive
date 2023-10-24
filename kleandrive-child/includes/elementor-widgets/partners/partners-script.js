jQuery(document).ready(function () {
    const mySwiperPartner = new Swiper(".mySwiperPartner", {
        loop: true,
        autoplay: true,
        slidesPerView: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        thumbs: {
            swiper: mySwiperPartner,
        },
    });

    var mySwiperPartnerThumb = new Swiper(".mySwiperPartnerThumb", {
        loop: true,
        watchSlidesProgress: true,
        slidesPerView: 1,
    });

});