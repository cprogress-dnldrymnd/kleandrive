
jQuery(document).ready(function () {
    var mySwiperPartnerThumbImages = new Swiper(".mySwiperPartnerThumbImages", {
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
            swiper: mySwiperPartnerThumbImages,
        },
    });


    const mySwiperPartnerGrid = new Swiper(".mySwiperPartnerGrid", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },

            767: {
                slidesPerView: 2,
            },


            992: {
                slidesPerView: 3,
            },

        },
    });

});