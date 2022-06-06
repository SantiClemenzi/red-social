window.addEventListener("load", function () {
    $(".btn-like").css("cursor", "pointer");
    $(".btn-dislike").css("cursor", "pointer");
    $(document).on("click", ".btn-like", function (e) {
        $(this).addClass("btn-dislike").removeClass("btn-like");
        $(this).attr("fill", "red");
        var url = 'http://localhost/projects/master_PHP/socialMedia-laravel/public/';
        $.ajax({
            url: url + 'like/'+$(this).data('id'),
            type: 'GET',
            success: function(response){
                console.log(response);
                // if(response.like){
                //     console.log('Has dado like a la publicacion');
                // }else{
                //     console.log('Error al dar like');
                // }
            },
        });
    });
    $(document).on("click", ".btn-dislike", function (e) {
        $(this).addClass("btn-like").removeClass("btn-dislike");
        $(this).attr("fill", "gray");
    });
});
