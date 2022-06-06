window.addEventListener("load", function () {
    $(".btn-like").css("cursor", "pointer");
    $(".btn-dislike").css("cursor", "pointer");

    var url =
        "http://localhost/projects/master_PHP/socialMedia-laravel/public/";

    $(document).on("click", ".btn-like", function (e) {
        $(this).addClass("btn-dislike").removeClass("btn-like");
        $(this).attr("fill", "red");

        $.ajax({
            url: url + "like/" + $(this).data("id"),
            type: "GET",
            success: function (response) {
                // console.log(response);
                if (response.like) {
                    alert("Has dado like a la publicacion");
                } else {
                    console.log("Error al dar like");
                }
            },
        });
    });
    $(document).on("click", ".btn-dislike", function (e) {
        $(this).addClass("btn-like").removeClass("btn-dislike");
        $(this).attr("fill", "gray");

        $.ajax({
            url: url + "dislike/" + $(this).data("id"),
            type: "GET",
            success: function (response) {
                // console.log(response);
                if (response.like) {
                    alert("Has dado dislike a la publicacion");
                } else {
                    console.log("Error al dar dislike");
                }
            },
        });
    });
});
