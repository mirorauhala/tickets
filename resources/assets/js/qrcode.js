$(document).ready(function() {

    if($("#qrcode")) {
        new QRious({
            element: document.getElementById('qrcode'),
            level: 'H',
            size: 250,
            padding: 25,
            value: $("#qrcode").data('qrcode')
        });

    }

})
