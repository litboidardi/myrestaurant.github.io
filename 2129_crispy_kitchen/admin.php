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
                                <p class="mb-2"><?php echo htmlspecialchars($reservation['message']); ?></p>
                            </div>
                        <?php endforeach; ?>
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