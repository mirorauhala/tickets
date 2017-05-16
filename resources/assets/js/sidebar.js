$(document).ready(function() {
    $(".sidebar-hamburger").on("click tap", function() {
        $(".sidebar").toggleClass("sidebar-closed").toggleClass("sidebar-open");
    })
})
