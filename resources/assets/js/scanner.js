jQuery(document).ready(function() {

    var scanner = new Instascan.Scanner({
        video: document.getElementById('qr-feed'),
        mirror: false
    });

    scanner.addListener('scan', function (barcode) {
        console.log(barcode);

        axios.get('/api/v1/order_item/' + barcode)
        .then(function (response) {
            console.log(response);
            var response = response.data.data
                seatingCode = null;

            // determine seating code
            if(response.ticket.data.is_seatable) {
                seatingCode = response.seat.data.name;
            } else {
                seatingCode = "N/A";
            }

            $(".data-body").fadeIn();
            $("#scanner-ticket-barcode").text(response.barcode);
            $("#scanner-ticket-type").text(response.ticket.data.name);
            $("#scanner-ticket-scan").text(response.scanned);
            $("#scanner-ticket-seating-code").text(seatingCode);
            $("#scanner-ticket-value").text(response.value_pretty);
        })
        .catch(function (error) {
            console.log(error);
        });
    });

    $(".data-close").on("click", function() {
        console.log("clicked");
        $(".data-body").fadeOut();
    });

    Instascan.Camera.getCameras()
    .then(function (cameras) {
        if (cameras.length > 0) {

            console.log(cameras);

            // hide
            $(".camera-permissions").hide();
            scanner.start(cameras[0]);

        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });





});
