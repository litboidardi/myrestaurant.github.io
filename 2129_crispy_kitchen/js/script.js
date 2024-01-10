function submitReservation(event) {
    if(confirm("Are you sure you want to submit this reservation?")) {
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
        alert("Your reservation was submitted!");
    } else {
        alert("Your reservation was not submitted!")
    }
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

var currentId = 0;
function loadReservationData(reservationId) {
    currentId = reservationId;
    $.ajax({
        url: 'lib/get_reservation.php', // Cesta k serverovému skriptu, ktorý vráti údaje rezervácie
        type: 'GET',
        data: { id: reservationId },
        success: function(reservationData) {
            // Predpokladajme, že 'reservationData' je objekt s údajmi rezervácie
            $('#name').val(reservationData.name);
            $('#email').val(reservationData.email);
            $('#phone').val(reservationData.phone);
            $('#people').val(reservationData.people);
            $('#date').val(reservationData.date);
            $('#time').val(reservationData.time);
            $('#message').val(reservationData.message);
        },
        error: function(error) {
            // Spracovanie chýb
            console.error("Chyba pri načítaní údajov: ", error);
        }
    });
}

function updateReservation() {
    var formData = {
        "reservation-id": currentId,
        "name": $('#name').val(),
        "email": $('#email').val(),
        "phone": $('#phone').val(),
        "people": $('#people').val(),
        "date": $('#date').val(),
        "time": $('#time').val(),
        "message": $('#message').val()
    };

    $.ajax({
        url: 'lib/update_reservation.php', // Zmena na správnu URL
        type: 'POST',
        data: formData,
        success: function(response) {
            $('#UpdateModal').modal('hide');
            alert("Reservation Updated Successfully!");
        },
        error: function(error) {
            console.error("Chyba pri aktualizácii: ", error);
        }
    });
}


