$(document).ready(function () {
    $('.nav-main [href*="/#news"]').parent().addClass( 'active' );
    $(".item-grid .editor p").find("a").parent("p").addClass("p--link");
    $(".item-grid .editor p").find("strong").parent("p").addClass("p--strong");
})