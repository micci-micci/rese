$(function ()
{
    $('.menu').on('click',function() {
        $('.menu-line').toggleClass('active');
        $('.gnav').fadeToggle();
    });
});

