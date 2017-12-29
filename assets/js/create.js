$(document).ready(function (e) {
    $('.img-check-gender').on('click', function () {
        $('.img-check-gender').removeClass("check-gender");
        $(this).addClass("check-gender");
    });

    $('.img-check-religions').on('click', function () {
        $('.img-check-religions').removeClass("check-religions");
        $(this).addClass("check-religions");
    });
});

