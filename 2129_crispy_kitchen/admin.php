<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moderator Settings</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/tooplate-crispy-kitchen.css" rel="stylesheet">
</head>

<body>
<main>
    <header class="site-header site-about-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 mx-auto">
                    <h1 class="text-white">Moderator Settings</h1>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </header>
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-5">Moderator Tools</h2>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="team-thumb">
                        <button type="button" class="custom-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#RegisterModal" style="width: 230px">Register Admin</button>
                        <button type="button" class="custom-btn btn btn-danger" style="margin-top: 10px;width: 230px" onclick="showMessages()">Check Messages</button>
                        <button type="button" class="custom-btn btn btn-danger" style="margin-top: 10px;width: 230px" onclick="showReservations()">Reservations</button>
                        <form action="parts/logout.php" method="post">
                            <button type="submit" class="custom-btn btn btn-danger" style="margin-top: 10px;width: 230px">Logout</button>
                        </form>
                        <?php
                        include_once "parts/register.php"
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-12 my-lg-0 my-4" id="messages" style="display: none">
                    <h4 class="mt-3 mb-0">Messages</h4>
                    <div class="team-thumb">
                        <?php
                        use lib\database;
                        include_once "lib/database.php";
                        $db = new Database();
                        $messageData = $db->getMessages();
                        // Fetch data from messages table
                        foreach ($messageData as $message) : ?>
                            <div class="news-author d-flex flex-wrap align-items-center">
                                <div class="ms-4 w-50">
                                    <p class="mb-2" style="width: 500px"><?php echo htmlspecialchars($message['message']); ?></p>
                                    <a class="mb-2" style="font-weight: bold"><?php echo htmlspecialchars($message['name']); ?></a>
                                    <p class="mb-2"><?php echo htmlspecialchars($message['email']); ?></p>
                                </div>
                                <p class="mb-2"><?php echo htmlspecialchars($message['phone']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-4 col-12" id="reservations" style="display: none">
                    <h4 class="mt-3 mb-0">Reservations</h4>
                    <div class="team-thumb">
                        <?php
                        $reservationData = $db->getReservations();
                        // Fetch data from reservations table
                        foreach ($reservationData as $reservation) : ?>
                            <div class="news-author d-flex flex-wrap align-items-center">
                                <div class="ms-4 w-50">

                                    <p class="mb-2" style="width: 500px"><?php echo htmlspecialchars($reservation['name']); ?></p>
                                    <p class="mb-2"><?php echo htmlspecialchars($reservation['date'])," "; ?><?php echo htmlspecialchars($reservation['time']); ?></p>
                                    <a class="mb-2" ><?php echo htmlspecialchars($reservation['phone']); ?></a>
                                    <a class="mb-2"><?php echo htmlspecialchars($reservation['email']); ?></a>
                                </div>
                                <button class="btn btn-danger" onclick="deleteReservation(<?php echo $reservation['id']; ?>)">Delete</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal" onclick="loadReservationData(<?php echo $reservation['id']; ?>)">
                                    Update
                                </button>

                                <p class="mb-2"><?php echo htmlspecialchars($reservation['message']); ?></p>
                            </div>
                        <?php endforeach; ?>
                        <!-- MODAL PRE UPDATE -->
                        <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="mb-0">Reserve a table</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-column justify-content-center">
                                        <div class="booking">
                                            <form id="resForm" class="booking-form row" role="form" action="#" method="post"">
                                            <div class="col-lg-6 col-12">
                                                <label for="name" class="form-label">Full Name</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="your@email.com">
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" class="form-control" placeholder="09xxxxxxxx">
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <label for="people" class="form-label">Number of persons</label>
                                                <input type="text" name="people" id="people" class="form-control" placeholder="12 persons">
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" name="date" id="date" value="" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <label for="time" class="form-label">Time</label>
                                                <select class="form-select form-control" name="time" id="time">
                                                    <option value="17:00:00" selected>5:00 PM</option>
                                                    <option value="18:00:00">6:00 PM</option>
                                                    <option value="19:00:00">7:00 PM</option>
                                                    <option value="20:00:00">8:00 PM</option>
                                                    <option value="21:00:00">9:00 PM</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="message" class="form-label">Special Request</label>

                                                <textarea class="form-control" rows="4" id="message" name="message" placeholder=""></textarea>
                                            </div>
                                            <div class="col-lg-4 col-12 ms-auto">
                                                <button type="submit" class="form-control" data-bs-dismiss="modal" onclick="updateReservation()">Update Reservation</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>




<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/script.js"></script>
</body>
</html>