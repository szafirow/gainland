$(document).ready(function (e) {
    $('.img-check').on('click', function () {
        $('.img-check').removeClass("check");
        $(this).addClass("check");
    });
});