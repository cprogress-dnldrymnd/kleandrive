jQuery(document).ready(function () {
    const mySwiperPartner = new Swiper(".mySwiperPartner", {
        loop: true,
        autoplay: true,
        slidesPerView: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });
    
});