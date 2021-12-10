<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Onevoice Network</title>
</head>
<body>
    <!-- creating navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
    <div class="container-fluid">
    <a class="navbar-brand " href="home.php"><img src="../images/logo.png" width="100" height="90"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bars">
            <li class="nav-item">
            <a class="nav-link active barsbars" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active barsbars" href="#">Calendar</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active barsbars">Contact</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- creating cards -->
    <div class="container home">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- card for community-->
        <div class="col">
            <div class="card h-90">
            <a href="community.php"><img src="../images/community.png" height="380px" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Community</h5>
                <p class="card-text">Explore our wonderful community</p>
            </div>
            </div>
        </div>
        <!-- card for projects-->
        <div class="col">
            <div class="card h-90">
            <a href="project.php"><img src="../images/hand.png" height="380px" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Projects</h5>
                <p class="card-text">Explore our different projects</p>
            </div>
            </div>
        </div>
        <!-- card for events-->
        <div class="col">
            <div class="card h-90">
            <a href="event.php"><img src="../images/event.png" height="380px" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Events</h5>
                <p class="card-text">Explore the different events</p>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>