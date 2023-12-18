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

function deleteReservation(reservationId) {
    if (confirm("Are you sure you want to delete this reservation?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Refresh the page after successful deletion
                location.reload();
            }
        };
        xhr.open("GET", "../lib/delete_reservation.php?id=" + reservationId, true);
        xhr.send();
    }
}

function updateReservation(reservationId) {
    let formData = $('#reservationForm').serialize();
    // Include reservationId in your formData or handle it as needed

    $.ajax({
        type: 'POST',
        url: `../lib/update_reservation.php?id=${reservationId}`,
        data: formData,
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            console.error(error.responseText);
        }
    });
}
