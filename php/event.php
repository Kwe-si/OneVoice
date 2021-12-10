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
    <title>Events</title>
</head>
<body>
    <!-- creating navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
    <div class="container-fluid">
    <a class="navbar-brand " href="home.php"><img src="../images/logo.png" width="100" height="90"></a>
    <a href="home.php"><button type="button" class="btn back-button">Back</button></a> 
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
    <div class="container mem">
        <div class="row">
            <!-- card for list of events -->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aloud Mega Praise</h5>
                    <p class="card-text">Details of all OneVoice Members</p>
                    <a href="../events/aloud.php" class="btn mem-card">Explore</a>
                </div>
                </div>
            </div>
            <!-- creating card for Hello Jesus Event -->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hello Jesus</h5>
                    <p class="card-text">Track the payment of dues of OneVoice Members</p>
                    <a href="../events/hellojesus.php" class="btn mem-card">Explore</a>
                </div>
                </div>
            </div>
            <!-- creating card for Intertiary Allnight Event -->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Intertiary Allnight</h5>
                    <p class="card-text">Track the attendance of OneVoice Members</p>
                    <a href="../events/intertertiary.php" class="btn mem-card">Explore</a>
                </div>
                </div>
            </div>
            <!-- creating card for Jesus Encounter Event -->
            <p>
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jesus Encounter</h5>
                        <p class="card-text">Explore the various departments in OneVoice</p>
                        <a href="../events/jencounter.php" class="btn mem-card">Explore</a>
                    </div>
                    </div>
                </div>
            <!-- creating card for Empowerment NIght Event -->
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Empowerment Night</h5>
                        <p class="card-text">Explore the various departments in OneVoice</p>
                        <a href="../events/empowerment.php" class="btn mem-card">Explore</a>
                    </div>
                    </div>
                </div>
            </p>
        </div>
    </div>
    <p>
        <center>
            <a href="eventdetails.php">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn add-button" type="button">See all</button>
                </div>
            </a>
        </center>
    </p>
</body>
</html>