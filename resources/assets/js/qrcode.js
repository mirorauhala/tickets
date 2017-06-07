$(document).ready(function() {


    var qrcode = new QRCode($(".qrcode"), {
        text: $(".qrcode").data('qrcode'),
        width: 128,
        height: 128,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.L
    });
})
