// window.addEventListener("load", function () {
//     // agregamos el pointer
//     $(".btn-like").css("cursor", "pointer");
//     $(".btn-dislike").css("cursor", "pointer");

//     function like() {
//         // btn like
//         $(".btn-like").click(function () {
//             console.log("like");
//             $(this).addClass("btn-dislike").removeClass("btn-like");
//             $(this).addClass("btn-dislike").removeClass("btn-like");
//             $(this).atrr("fill", "red");
//             dislike();
//         });
//     }
//     like();

//     function dislike() {
//         // btn dislike
//         $(".btn-dislike").click(function () {
//             console.log("dislike");
//             $(this).addClass("btn-like").removeClass("btn-dislike");
//             $(this).addClass("btn-like").removeClass("btn-dislike");
//             $(this).atrr("fill", "currentColor");
//             like();
//         });
//     }
//     dislike();
// });
window.addEventListener("load", function () {
    $(".btn-like").css("cursor", "pointer");
    $(".btn-dislike").css("cursor", "pointer");
    $(document).on("click", ".btn-like", function (e) {
        $(this).addClass("btn-dislike").removeClass("btn-like");
        $(this).attr("fill", "red");
    });
    $(document).on("click", ".btn-dislike", function (e) {
        $(this).addClass("btn-like").removeClass("btn-dislike");
        $(this).attr("fill", "gray");
    });
});
