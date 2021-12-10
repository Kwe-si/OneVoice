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
    <title>Department</title>
</head>
<body>
    <!-- creating navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
    <div class="container-fluid">
    <a class="navbar-brand " href="home.php"><img src="../images/logo.png" width="100" height="90"></a>
    <a href="members.php"><button type="button" class="btn back-button">Back</button></a> 
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
            <!-- creating card for prayer department -->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Prayer</h5>
                    <p class="card-text">Responsible for the spiritual welfare of the organization</p>
                    <a href="../departments/prayer.php" class="btn mem-card">Explore</a>
                </div>
                </div>
            </div>
            <!-- creating card for database department -->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Database</h5>
                    <p class="card-text">Responsible for managing records of the organization</p>
                    <a href="../departments/database.php" class="btn mem-card">Explore</a>
                </div>
                </div>
            </div>
            <!-- creating card for choir department -->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Choir</h5>
                    <p class="card-text">Wonderful Mass choir that sings to the Glory of God</p>
                    <a href="../departments/choir.php" class="btn mem-card">Explore</a>
                </div>
                </div>
            </div>
            <!-- creating card for paraphernelia department -->
            <p>
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Paraphernelia</h5>
                        <p class="card-text">Responsible for the clothing of the organization</p>
                        <a href="../departments/paraphernelia.php" class="btn mem-card">Explore</a>
                    </div>
                    </div>
                </div>
            </p>
        </div>
    </div>

</body>
</html>