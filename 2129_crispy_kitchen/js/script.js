function submitReservation(event) {
    event.preventDefault();
    let formData = $('#reservationForm').serialize();
    var errorMessageElement = $('#reservationForm').find('.error-message');
    $.ajax({
        type: 'POST',
        url: 'lib/process_reservation.php', // Adjust the path accordingly
        data: formData,
        success: function (response) {
            if (response.status === 'success') {
                window.location.href = '../index.php';
            } else {
                errorMessageElement.text(response.message);
            }
        },
        error: function (error) {
            errorMessageElement.text(error.responseText);
        }
    });
}

$('#reservationForm').on('submit', submitReservation);

function showMessages() {
    var x = document.getElementById('messages');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function showReservations() {
    var y = document.getElementById('reservations');
    if (y.style.display === "none") {
        y.style.display = "block";
    } else {
        y.style.display = "none";
    }
}