<?php
require "../php/database_connection_test.php";


//function to delete a person
$deleteresult ="";
if(isset($_POST['Delete'])){
    $theID=$_POST['ID'];
    echo $theID;
  $deleteresult =  delete($theID, $conn);

}

$theID = "";
function delete($theID, $conn){
    // delete person
      $del="delete from `members` where `memID`='$theID'";
      $q=mysqli_query($conn,$del);
      echo mysqli_error($conn); 
}

//function to select and display members
$data=null;
function listing($conn){
    $aloud=mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) as Fullname, Ev.eventName, Evm.eventrole
    from Members as M Inner Join Person as P on M.memID=P.personID
    Inner Join EventMember as Evm on Evm.personID=M.memID
    Inner Join Eventss as Ev on Ev.eventID=EvM.eventID
    where Ev.eventName like '%Aloud%';");
    $data=mysqli_fetch_all($aloud,MYSQLI_ASSOC);
    echo mysqli_error($conn);
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
    $sql2 = mysqli_query($conn, "SELECT concat(P.fname, ' ', P.middlename, ' ', P.lname) as 'Fullname' from `person` as p where concat(P.fname, ' ', P.middlename, ' ', P.lname) LIKE '%$theword%'");
    $searchquery=mysqli_fetch_all($sql2);
    echo mysqli_error($conn);  
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
    <title>Aloud Mega Praise</title>
</head>
<body>
    <!-- creating Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
        <div class="container-fluid">
        <a class="navbar-brand " href="home.php"><img src="../images/logo.png" width="100" height="90"></a>
        <a href="../php/event.php"><button type="button" class="btn back-button">Back</button></a> 
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
                <th>Name of Member</th>
                <th>Name of Event</th>
                <th>Event Role</th>
            </tr>

            <!-- looping through rows with results of the query to display the status of dues of members -->

            <?php foreach($data as $q){ ?>
                <tr>
                    <?php if (in_array($q['Fullname'],$searchresult)) { ?>
                        <td class="highlight"><?php echo $q['Fullname'] ?></td>
                        <td class="highlight"><?php echo $q['eventName'] ?></td>
                        <td class="highlight"><?php echo $q['eventrole'] ?></td>
                        <td>
                                <form action="" method="post" onSubmit="onDelete(event)">
                                    <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                                    <input type="text" name="ID" value="<?php echo $q["memID"] ?>" hidden/>  
                                </form>
                            </td>
                    <?php } else { ?>
                            <td><?php echo $q['Fullname']?></td>
                            <td><?php echo $q['eventName'] ?></td>
                            <td><?php echo $q['eventrole'] ?></td>
                            <td>
                                <form action="" method="post" onSubmit="onDelete(event)">
                                    <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                                    <input type="text" name="ID" value="<?php echo $q["memID"] ?>" hidden/>  
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