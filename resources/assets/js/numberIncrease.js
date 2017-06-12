(function($) {
    $.extend($.fn, {
        "addOne": function() {
            var num = parseInt($(this).val(), 10);
            if($(this).attr('max') != num) {
                $(this)[0].value = ++num;
            }
        },

        "subtractOne": function() {
            var num = parseInt($(this).val(), 10);
            if($(this).attr('min') != num) {
                $(this)[0].value = --num;
            }
        }
    });
}(jQuery));


$(document).ready(function() {
    $(".addOne").on("click", function(e) {
        $(this).parent().parent().find("input[type='number']").addOne();
    });

    $(".subtractOne").on("click", function(e) {
        $(this).parent().parent().find("input[type='number']").subtractOne();
    });
});
