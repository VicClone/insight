$( document ).ready(function() {
    $('.staff').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        prevArrow: $('.staff__btn-prev'),
        nextArrow: $('.staff__btn-next'),
    });
});
