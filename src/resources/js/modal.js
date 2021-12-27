$(function ()
{
    $('.js-modal-open').on('click', function()
    {
        let target = $(this).data('target');
        let modal = document.getElementById(target);
        var id = $(this).data('whatever')
        console.log(id);
        $(modal).fadeIn();
        $(modal).find('.modal-delete-val').val(id) //user_id をInput に渡す
        return false;
    });
    $('.js-modal-close').on('click', function()
    {
        $('.js-modal').fadeOut();
        return false;
    })
});
