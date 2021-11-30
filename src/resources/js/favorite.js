$(function ()
{
    $('.favorite-toggle').on('click', function()
    {
        user_id = $(this).attr("user_id");
        restaurant_id = $(this).attr("restaurant_id");
        favorite_count = $(this).attr("favorite_count");
        click_btn = $(this);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/favorite',
            method: 'POST',
            data: {
                'user_id': user_id,
                'restaurant_id': restaurant_id
            }
        })

        .done(function(date)
        {
            if (date === 0)
            {
                click_btn.attr("favorite_count", 1);
                click_btn.children().attr("class", "favorite")
            }
            else (date === 1)
            {
                click_btn.attr("favorite_count", 0);
                click_btn.children().attr("class", "favorited")
            }
        })
        .fail(function(date)
        {
            alert('いいね処理の失敗')
            console.log(JSON.stringify(data))
        })
    }
    )
});
