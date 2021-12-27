$(function ()
{
    $('.js-modal-open').on('click', function()
    {
        let target = $(this).data('target');
        let modal = document.getElementById(target);
        let name = $(this).data('value')
        console.log(name);
        $(modal).fadeIn();
        $(modal).find('.modal-restaurant-name-val').text(name)
        return false;
    });
    $('.js-modal-close').on('click', function()
    {
        $('.js-modal').fadeOut();
        return false;
    })
});
