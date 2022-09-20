$(window).scroll(function(){
    let scrolltop=$(window).scrollTop();
    if(scrolltop>50){
        $('.navbar').css('border-bottom','4px solid #2572B1');
    }else if(scrolltop<=50){
        $('.navbar').css('border-bottom','none');
    }
    if(scrolltop<=600){
        $('#arrow-top').css('right','-150px');
    }else if(scrolltop>=600){
        $('#arrow-top').css('right','40px');
    }
})


// Back to top button
$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
});
$('.back-to-top').click(function () {
    $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
    return false;
});

// Courses carousel
$(".courses-carousel").owlCarousel({
    rtl:true,
    autoplay: true,
    smartSpeed: 1500,
    loop: true,
    dots: false,
    nav : false,
    responsive: {
        0:{
            items:1
        },
        576:{
            items:2
        },
        768:{
            items:3
        },
        992:{
            items:4
        }
    }
});