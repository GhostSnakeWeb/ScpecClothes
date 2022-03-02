$(document).ready(function () {

    $('.carousel').slick({
        dots:true

    })
    $('.popular-products').slick({
        slidesToShow: 4,
        slidesToScroll:4,
        dots: true,
        variableWidth:true,
        responsive:[
            {
                breakpoint: 1400,
                settings:{
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    variableWidth: false
                }
            },
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    variableWidth: false,
                    arrows: false
                }
            },
            {
                breakpoint:580,
                settings:{
                    slidesToShow:1,
                    slidesToScroll:1,
                    variableWidth:false,
                    arrows: false
                }
            }
        ]
    })
    $('.slider-single').slick({
        slidesToShow:1,
        slidesToScroll: 1,
        dots: false,
        arrows: true
    })
    $('.slider-single-nav').slick({
        slidesToShow:4,
        slidesToScroll:4,
        asNavFor:'.slider-single',
        dots:false,
        arrows:false,
        centerMode:true,
        focusOnSelect: true,
        adaptiveHeight: true
    })

})
//Закрытие каталога при клике за его пределами

// $(document).onmouseup(function () {
//     var catalog = $('.catalog-sidebar')
//     if(!catalog.is(e.target) && catalog.has(e.target).length===0){
//         sidebarToggler();
//     }
// })
$(document).click(function (e) {
    if($(e.target).closest('.catalog-sidebar').length){
        return
    }
    if($('.catalog-sidebar').css("margin-left")==="0px") {
        sidebarToggler()
    }
})
//События для попапов

$('[data-popup="popupCall"]').on('click', function () {
    $('.call-request-popup').addClass('d-flex')
})

$('[data-popup="popupSend"]').on('click', function () {
    $('.send-request-popup').addClass('d-flex')
})

$('.popup__close-button').on('click', function () {
    $(this).parents('.popup-wrapper').removeClass('d-flex')
})

$('.single-product__more').on('click',function () {
    $(this).toggle();
    $('.single-product__description').toggle();
})

$('.sub-menu-toggler').on('click',function () {
    $(this).toggleClass('rotate')
    $(this).parents('.catalog-sidebar__item').children('ul').slideToggle();
})

const sidebarButtonSelector = $('[data-sidebar="catalogOpen"]')

$('.catalog-sidebar__close-button').on('click', sidebarToggler)

sidebarButtonSelector.on('click', sidebarToggler)

function sidebarToggler() {
    if($('.catalog-sidebar').css("margin-left")==="-480px"){
        $('.catalog-sidebar').animate({"margin-left":"0"})
        $('.catalog-open').toggleClass('color-grey')
    }
    else{
        $('.catalog-sidebar').animate({"margin-left":"-480px"})
        $('.catalog-open').toggleClass('color-grey')
    }

}


$('.search-form__button').on('click', function () {
    if($('.search-form__text').val().length==0){
        alert("Введите запрос для поиска")
        event.preventDefault()
    }
})

// MixItUp

var mixer = mixitup('.products-list')
const curSelectValue = $('#section-select')[0].value

if (curSelectValue !== "undefined" || curSelectValue !== null || curSelectValue !==  "") {
    mixer.filter(curSelectValue);
}

$('#section-select').on('change', function () {
    mixer.filter(this.value);
})