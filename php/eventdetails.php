<?php
require __DIR__ ."/database_connection_test.php";


//function to delete an event
$deleteresult ="";
if(isset($_POST['Delete'])){
    $theID=$_POST['ID'];
  $deleteresult =  delete($theID, $conn);

}

$theID = "";
function delete($theID, $conn){
    // delete event
      $del="delete from `eventss` where `eventID`='$theID'";
      $q=mysqli_query($conn,$del); 
}

//function to select and display attendance status of members
$data=null;
function listing($conn){
    $event_details=mysqli_query($conn, "SELECT distinct Ev.eventName, Ev.location, Es.eventbudget, S.spName, S.typeofSponsorship, S.amountpaid, Es.paymentdate
    from Eventss as Ev Inner Join EventSponsor as Es on Ev.eventID =
    Es.eventID
    Inner Join Sponsor as S on S.spID=Es.spID");
    $data=mysqli_fetch_all($event_details,MYSQLI_ASSOC);
    return $data;
}
    $data=listing($conn);       //data stores result of the query

//implementing user search
$searchresult = [];
    if(isset($_GET['searchbar'])){ 
        $input = $_GET['searchbar'] ;
        $searchresult = array_map("reduceArray", selection($input, $conn));
      }
    
//function to reduce array to a single array
function reduceArray($array) {
    return $array[0];
}  

//query to find name searched for
function selection($theword, $conn){    
    $theword =trim($theword);
    $sql2 = mysqli_query($conn, "SELECT ev.eventName from `eventss` as ev where ev.eventName LIKE '%$theword%'");
    $searchquery=mysqli_fetch_all($sql2);  
    return $searchquery; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Event Details</title>
</head>
<body>
    <!-- creating Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
        <div class="container-fluid">
        <a class="navbar-brand " href="home.php"><img src="../images/logo.png" width="100" height="90"></a>
        <a href="event.php"><button type="button" class="btn back-button">Back</button></a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bars">
                <form action="" method="get" class="search-bar">
                        <li>          
                            <input type="text" name= "searchbar"  placeholder="Search..">           
                        </li>
                </form>
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

    <!-- Defining table headers -->
    <div class="table-responsive">
        <table class="table table-hover table-color table-bordered att">
            <tr>
                <th>Name of Event</th>
                <th>Location</th>
                <th>Event Budget</th>
                <th>Name of Sponsor</th>
                <th>Type of Sponsorship</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
            </tr>

            <!-- looping through rows with results of the query to disply the details of events -->

            <?php foreach($data as $q){ ?>
                <tr>
                    <?php if (in_array($q['eventName'],$searchresult)) { ?>
                        <td class="highlight"><?php echo $q['eventName'] ?></td>
                        <td class="highlight"><?php echo $q['location'] ?></td>
                        <td class="highlight"><?php echo $q['eventbudget'] ?></td>
                        <td class="highlight"><?php echo $q['spName'] ?></td>
                        <td class="highlight"><?php echo $q['typeofSponsorship'] ?></td>
                        <td class="highlight"><?php echo $q['amountpaid'] ?></td>
                        <td class="highlight"><?php echo $q['paymentdate'] ?></td>
                        <td>
                                <form action="" method="post" onSubmit="onDelete(event)">
                                    <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                                    <input type="text" name="ID" value="<?php echo $q["eventID"] ?>" hidden/>  
                                </form>
                            </td>
                    <?php } else { ?>
                            <td><?php echo $q['eventName']?></td>
                            <td><?php echo $q['location'] ?></td>
                            <td><?php echo $q['eventbudget'] ?></td>
                            <td><?php echo $q['spName']?></td>
                            <td><?php echo $q['typeofSponsorship']?></td>
                            <td><?php echo $q['amountpaid'] ?></td>
                            <td><?php echo $q['paymentdate']?></td>
                            <td>
                                <form action="" method="post" onSubmit="onDelete(event)">
                                    <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                                    <input type="text" name="ID" value="<?php echo $q["eventID"] ?>" hidden/>  
                                </form>
                            </td>
                    <?php } ?>
                
                </tr>

            <?php } ?>
        </table>
    </div>
  
<script src="../javascript/delete.js"></script>
</body>
</html>