$(function ()
{
    $('.js-edit-modal-open').on('click', function()
    {
        let target = $(this).data('target');
        let modal = document.getElementById(target);
        let restaurant_id = $(this).data('id')
        console.log(restaurant_id);
        $(modal).fadeIn();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'restaurant_search',
            method: 'GET',
            data: {
                'id': restaurant_id
            }
        })
        .done(function(data)
        {
            console.log('success');
            console.log(data);
            let id = data.id;
            let name = data.name;
            let area_id = data.area_id;
            let category_id = data.category_id;
            let image_url = data.image_url;
            let description = data.description;

            $('#restaurant_name').val(name);
            $('#restaurant_image_url').attr('src', image_url);
            $('#restaurant_area').val(area_id);
            $('#restaurant_category').val(category_id);
            $('#restaurant_description').val(description);
            $('#restaurant_id').val(id);
        })
        .fail(function(data)
        {
            console.log(JSON.stringify(data))
        })
    });

    $('.js-edit-modal-close').on('click', function()
    {
        $('.js-edit-modal').fadeOut();
        return false;
    })
});
