$(function ()
{
    $('.js-modal-open').on('click', function()
    {
        // var target = $(this).data('target');
        // var modal = document.getElementById(target);
        $('.js-modal').fadeIn();
        return false;
    });
    $('.js-modal-close').on('click', function()
    {
        $('.js-modal').fadeOut();
        return false;
    })
});
