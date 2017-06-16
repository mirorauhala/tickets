$(function () {
    $('[data-toggle="tooltip"]').tooltip()

    if($('.map')) {
        $('.map').on('click', function(e) {
            var x = e.pageX - $('.map').offset().left;
            var y = e.pageY - $('.map').offset().top;
            var coor = "top: " + y + ", left: " + x;
            console.log(coor);
        })
    }
})
