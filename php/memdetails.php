<?php
require __DIR__ ."/database_connection_test.php";


//function to delete a member
$deleteresult ="";
if(isset($_POST['Delete'])){
    $theID=$_POST['ID'];
  $deleteresult =  delete($theID, $conn);

}

$theID = "";
function delete($theID, $conn){
    // delete from dues in the database 
      $del="delete from `members` where `memID`='$theID'";
      $q=mysqli_query($conn,$del); 
}

//function to select and display attendance status of members
$data=null;
function listing($conn){
    $mem_details=mysqli_query($conn, "SELECT P.personID, M.memID, Ev.eventID, DP.devID, concat(P.fname, ' ', P.middlename, ' ', P.lname) as Fullname, D.deptName, DP.projectName,
    DPM.projectrole, Ev.eventName, Evm.eventrole, D.deptNum,
    case
    when D.deptname = 'Database' then 'Kweku Asante'
    when D.deptname = 'Prayer' then 'Charles Ofori'
    when D.deptname = 'Choir' then 'Jacob Nana'
    when D.deptname = 'Protocol' then 'Michael Osei'
    when D.deptname = 'Paraphernelia' then 'Doreen Owusu'
    else 'Select a Department'
    end as HeadofDepartment,
    case
    when DP.projectName = 'Navrongo Project' then 'Monica Atuchem'
    when DP.projectName = 'Dome Project' then 'Kwabena Asare'
    when DP.projectName = 'Ashiaman Project' then 'Franklin Obeng'
    when DP.projectName = 'Jamestown Project' then 'Rev Charles'
    else 'Select a Project'
    end as projectlead,
    case
    when Ev.eventName = 'Aloud Mega Praise' then 'Charles Osei'
    when Ev.eventName = 'Hello Jesus' then 'Joel Oppong'
    when Ev.eventName = 'Intertiary Allnight' then 'Franklin Obeng'
    when Ev.eventName = 'Empowerment Night' then 'David Asare'
    when Ev.eventName = 'Jesus Encounter' then 'Akorfa Effe'
    else 'Select an Event'
    end as eventlead
    from Members as M Inner Join Person as P on M.memID=P.personID
    Inner Join EventMember as Evm on Evm.personID=M.memID
    Inner Join Eventss as Ev on Ev.eventID=Evm.eventID
    Inner Join DepartmentPerson as Dep on Dep.deptpersonID=P.personId
    Inner Join Department as D on D.deptNum=Dep.deptNum
    Inner Join DevProjectMember as DPM on DPM.personID=M.memID
    Inner Join DevelopmentProject as DP on DP.devID=DPM.devID");
    $data=mysqli_fetch_all($mem_details,MYSQLI_ASSOC);
    return $data;
}      //data stores result of the query

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
    return $searchquery; 
}

//updating the details of members
//checking if okay has been pressed

if(isset($_POST['Okaybutton'])){
    $firstname=$_POST['fname'];
    $middlename=$_POST['Mname'];
    $lastname=$_POST['lname'];
    $gender=$_POST['gender'];
    $DOB=$_POST['DOB'];
    $nationality=$_POST['nationality'];
    $contact=$_POST['parnum'];
    $address=$_POST['address'];
    $department=$_POST['department'];
    $project=$_POST['project'];
    $project_role=$_POST['projectro'];
    $event=$_POST['event'];
    $event_role=$_POST['eventro'];
    $memberID=$_POST['memID'];
    $eventID=$_POST['eventID'];
    $devID=$_POST['devID'];
    $deptnum=$_POST['deptNum'];

    

    //updating different tables
    $updateperson = "UPDATE `person` set `fname`= '$firstname', `middlename` = '$middlename', `lname` = '$lastname', `gender` = '$gender', `DOB` = '$DOB', `contact` = '$contact',`nationality` = '$nationality', `residential_address` = '$address' where `personID`='$memberID'";
    $personinfoupdate = mysqli_query($conn,$updateperson);

    $updatedept = "UPDATE `department` set `deptName`= '$department' where `deptNum`='$deptnum'";
    $deptinfoupdate = mysqli_query($conn,$updatedept);

    $updateproject = "UPDATE `developmentproject` set `projectName`= '$project' where `devID`='$devID'";
    $projectinfoupdate = mysqli_query($conn,$updateproject);

    $updatedevprojectmem = "UPDATE `devprojectmember` set `projectrole`= '$project_role' where `devID`='$devID'";
    $devprojectinfoupdate = mysqli_query($conn,$updatedevprojectmem);

    $updateevent = "UPDATE `eventss` set `eventName`= '$event' where `eventID`='$eventID'";
    $eventinfoupdate = mysqli_query($conn,$updateevent);

    $updateevmember = "UPDATE `eventmember` set `eventrole`= '$event_role' where `eventID`='$eventID'";
    $evmemberinfoupdate = mysqli_query($conn,$updateevmember);
    
}

$data=listing($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Member Details</title>
</head>
<body>
    <!-- creating pop-up form -->
    <div class="popup">
        <form class="row container m-auto form-background popup-form" id="popup-form"  action="memdetails.php" method="post">
            
            <h6> Personal Information </h6>
            <div class="col-4 d-flex flex-column">
                <label for="fname">First name:</label>
                <input type="text" id="fname" name="fname" onInput="validateFname()">
                <span id="error"></span>
            </div>
        
            <div class="col-4 d-flex flex-column">
                <label for="Mname">Middle Name:</label>
                <input type="text" id="Mname" name="Mname"  onInput="validateMname()">
                <span id="Merror"></span>
            </div>
            
            <div class="col-4 d-flex flex-column">
                <label for="lname">Last name:</label>
                <input type="text" id="lname" name="lname"  onInput="validateLname()">
                <span id="lerror"></span>
            </div>
            
            <div class="col-12">
                <label>Gender:</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>

            <div class="col-6 d-flex flex-column">
                <label for="DOB">Date of Birth:</label>
                <input type="date" id="DOB" name="DOB" onInput="validateDate()" ><br>
                <span id="derror"></span>
            </div>

            <div class="col-6 d-flex flex-column">
                    <label for="parnum">Contact:</label>
                    <input type="text" id="parnum" name="parnum" onInput="validatePNUM()"><br>
                    <span id="pnumerror"></span>
            </div>

            <div class="col-6 d-flex flex-column">
                <label for="nationality">Nationality</label>
                <input type="text" id="nationality" name="nationality" onInput="validateN()" >
                <span id="nerror"></span>
            </div>

            <div class="col-6 d-flex flex-column">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" onInput="validateA()" ><br>
                    <span id="aerror"></span>
            </div>   

            <div class="col-6 d-flex flex-column">
                <label for="department">Department:</label>
                <select name = "department" id="department">
                    <option value = "choose" selected>    </option>
                    <option value = "Database" name="Database">Database</option>
                    <option value = "Prayer" name="Prayer">Prayer</option>
                    <option value = "Choir" name= "Choir">Choir</option>
                    <option value = "Protocol" name="Protocol">Protocol</option>
                    <option value = "Paraphernelia" name="Paraphernelia">Paraphernelia</option>
                </select>
            </div> 

            <h6>NGO Info</h6>

            <div class="col-6 d-flex flex-column">
                <label for="project">Project Name:</label>
                <select name = "project" id="project">
                    <option value = "choose" selected>    </option>
                    <option value = "Navrongo Project" name="Navrongo Project">Navrongo Project</option>
                    <option value = "Dome Project" name="Dome Project">Dome Project</option>
                    <option value = "Ashiaman Project" name= "Ashiaman Project">Ashiaman Project</option>
                    <option value = "Jamestown Project" name="Jamestown Project">Jamestown Project</option>
                    <option value = "Esujaman Evangelism Project" name="Esujaman Evangelism Project">Esujaman Evangelism Project</option>
                </select>
            </div> 

            <div class="col-6 d-flex flex-column">
                <label for="projectro">Project Role:</label>
                <select name = "projectro" id="projectro">
                    <option value = "choose" selected>    </option>
                    <option value = "Usher" name="Usher">Usher</option>
                    <option value = "Prayer" name="Prayer">Prayer</option>
                    <option value = "Media" name= "Media">Media</option>
                    <option value = "Partnership" name="Partnership">Partnership</option>
                    <option value = "Protocol" name="Protocol">Protocol</option>
                </select>
            </div> 

            <div class="col-6 d-flex flex-column">
                <label for="event">Event Name:</label>
                <select name = "event" id="event">
                    <option value = "choose" selected>    </option>
                    <option value = "Aloud Mega Praise" name="Aloud Mega Praise">Aloud Mega Praise</option>
                    <option value = "Hello Jesus" name="Hello Jesus">Hello Jesus</option>
                    <option value = "Intertiary Allnight" name= "Intertiary Allnight">Intertiary Allnight</option>
                    <option value = "Jesus Encounter" name="Jesus Encounter">Jesus Encounter</option>
                    <option value = "Empowerment Night" name="Empowerment Night">Empowerment Night</option>
                </select>
            </div> 

            <div class="col-6 d-flex flex-column">
                <label for="eventro">Event Role:</label>
                <select name = "eventro" id="eventro">
                    <option value = "choose" selected>    </option>
                    <option value = "Usher" name="Usher">Usher</option>
                    <option value = "Prayer" name="Prayer">Prayer</option>
                    <option value = "Media" name= "Media">Media</option>
                    <option value = "Partnership" name="Partnership">Partnership</option>
                    <option value = "Protocol" name="Protocol">Protocol</option>
                </select>
            </div> 

            <input type="hidden" name="memID">
            <input type="hidden" name="eventID">
            <input type="hidden" name="deptNum">
            <input type="hidden" name="devID">
            <input type="hidden" name="personID">
            
            <p>
                <center>
                    <div class=" col-2 d-flex">
                        <input class="btn edit-color me-2" type="submit"  name="Okaybutton" value="Okay">
                        <button class="ms-2 btn btn-danger" onClick="closePopup(event)">Cancel</button>
                    </div>
                </center>
            </p>
    
        </form>

    </div>
    <!-- creating Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
        <div class="container-fluid">
        <a class="navbar-brand " href="home.php"><img src="../images/logo.png" width="100" height="90"></a>
        <a href="members.php"><button type="button" class="btn back-button">Back</button></a> 
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
                <th>Fullname</th>
                <th>Department Name</th>
                <th>Head of Department </th>
                <th>Name of Project</th>
                <th>Role in Project</th>
                <th>Project Lead</th>
                <th>Name of Event</th>
                <th>Role in Event</th>
                <th>Event Lead</th>
            </tr>

            <!-- looping through rows with results of the query to display the status of dues of members -->

            <?php foreach($data as $q){ ?>
                <tr>
                    <?php if (in_array($q['Fullname'],$searchresult)) { ?>
                        <td class="highlight"><?php echo $q['Fullname'] ?></td>
                        <td class="highlight"><?php echo $q['deptName'] ?></td>
                        <td class="highlight"><?php echo $q['HeadofDepartment'] ?></td>
                        <td class="highlight"><?php echo $q['projectName'] ?></td>
                        <td class="highlight"><?php echo $q['projectrole'] ?></td>
                        <td class="highlight"><?php echo $q['projectlead'] ?></td>
                        <td class="highlight"><?php echo $q['eventName'] ?></td>
                        <td class="highlight"><?php echo $q['eventrole'] ?></td>
                        <td class="highlight"><?php echo $q['eventlead'] ?></td>
                    <?php } else { ?>
                            <td><?php echo $q['Fullname']?></td>
                            <td><?php echo $q['deptName'] ?></td>
                            <td><?php echo $q['HeadofDepartment'] ?></td>
                            <td><?php echo $q['projectName']?></td>
                            <td><?php echo $q['projectrole']?></td>
                            <td><?php echo $q['projectlead']?></td>
                            <td><?php echo $q['eventName']?></td>
                            <td><?php echo $q['eventrole']?></td>
                            <td><?php echo $q['eventlead']?></td>
                            <td>
                                <form action="" method="post" class="form-submit" onSubmit="onEdit(event)">
                                    <input class="btn edit-color" type = "submit" name="Edit"  value="Edit"/>
                                    <input type="text" name="ID" value="<?php echo $q["memID"] ?>" hidden/>  
                                </form>
                            </td>
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
    <p>
        <center>
            <a href="../forms/add_member.php">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn add-button" type="button">Add Member</button>
                </div>
            </a>
        </center>
    </p>
<script src="../javascript/delete.js"></script>
<script src="../javascript/member.js"></script>
</body>
</html>