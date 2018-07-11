$(document).scroll(function(){
    if($(window).width()<=750){
        return false;
    }
    var scrollAll = $(document).height()-$(window).height();
    var h = 1089;
    if(scrollAll - $(document).scrollTop()>=h){
        $('.post_body.type_girl').css('backgroundPositionY',$(document).scrollTop())
    }
});