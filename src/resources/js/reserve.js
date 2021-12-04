$(function ()
{
    $('.date-toggle').on('change', function() {
    let date = $(this).val();
    $('#date').text(date);
    });
    $('.time-toggle').on('change', function() {
        let time = $(this).val();
        $('#time').text(time);
    });
    $('.number-toggle').on('change', function() {
        let number = $(this).val();
        $('#number').text(number);
    });
});
