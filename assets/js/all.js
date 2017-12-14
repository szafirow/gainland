/**
 * Znikający alert
 */

$(".alert").delay(6000).slideUp(200, function () {
    $(this).alert('close');
});