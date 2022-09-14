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