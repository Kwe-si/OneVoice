<?php
require "../php/database_connection_test.php";

//checking if form has been sumbitted and storing values of form fields
if(isset($_POST['SubmitButton'])){
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

    //inserting into the person table
    $insertperson ="INSERT INTO `person` (`fname`, `middlename`, `lname`, `gender`, `DOB`, `contact`, `residential_address`, `nationality`) VALUES (";
    $insertpersoncont=" '$firstname', '$middlename', '$lastname', '$gender', '$DOB', '$contact', '$address', '$nationality')";
    $insertperson = $insertperson.$insertpersoncont;
    $personquery= mysqli_query($conn,$insertperson);

    //retrieving the person id to use as a foreign key in other tables
    $person_id=null; 
    if($personquery){
        $person_id=mysqli_insert_id($conn);
    }

    //inserting into the department table
    $insertdept ="INSERT INTO `department` (`deptName`) VALUES (";
    $insertdeptcont=" '$department')";
    $insertdept = $insertdept.$insertdeptcont;
    $deptquery= mysqli_query($conn,$insertdept);

    //retrieving the department id to use as a foreign key in other tables
    $dept_id=null;
    if($deptquery){
        $dept_id=mysqli_insert_id($conn);
    }

    //inserting into the departmentperson table
    $insertdeptperson = "INSERT INTO `departmentperson` (`deptpersonID`,`deptNum`)VALUES(";
    $insertdeptpersoncont = "'$person_id','$dept_id')";
    $insertdeptperson = $insertdeptperson.$insertdeptpersoncont;
    $deptpersonquery=mysqli_query($conn,$insertdeptperson);

    //inserting into the member table
    $insertmem ="INSERT INTO `members` (`memID`) VALUES('$person_id')";
    $memquery = mysqli_query($conn,$insertmem);
    
    //retrieving the member id  to use as a foreign key in other tables
    $mem_id=null;
    if($memquery){
        $mem_id=mysqli_insert_id($conn);
    }

    //inserting into the development project table
    $insertproject ="INSERT INTO `developmentproject` (`projectName`) VALUES (";
    $insertprojectcont=" '$project')";
    $insertproject = $insertproject.$insertprojectcont;
    $projectquery= mysqli_query($conn,$insertproject);

    //retrieving the project id to use as a foreign key in other tables
    $project_id=null;
    if($projectquery){
        $project_id=mysqli_insert_id($conn);
    }

    //inserting into the development project member table
    $insertprojectmem ="INSERT INTO `devprojectmember` (`personID`,`devID`,`projectrole`) VALUES (";
    $insertprojectmemcont=" '$person_id', '$project_id', '$project_role')";
    $insertprojectmem = $insertprojectmem.$insertprojectmemcont;
    $projectmemquery= mysqli_query($conn,$insertprojectmem);
    if($projectmemquery){
    }

    //inserting into the events project table
    $insertevent ="INSERT INTO `eventss` (`eventName`) VALUES (";
    $inserteventcont=" '$event')";
    $insertevent = $insertevent.$inserteventcont;
    $eventquery= mysqli_query($conn,$insertevent);

    $event_id=null;
    if($eventquery){
        $event_id=mysqli_insert_id($conn);
    }

    //inserting into the event member table
    $inserteventmem ="INSERT INTO `eventmember` (`personID`,`eventID`,`eventrole`) VALUES (";
    $inserteventmemcont=" '$person_id', '$event_id','$event_role')";
    $inserteventmem = $inserteventmem.$inserteventmemcont;
    $eventmemquery= mysqli_query($conn,$inserteventmem);

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
    <title>Add Member</title>
</head>
<body>
    <!-- creating Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
        <div class="container-fluid">
        <a class="navbar-brand " href="home.php"><img src="../images/logo.png" width="100" height="90"></a>
        <a href="../php/memdetails.php"><button type="button" class="btn back-button">Back</button></a>
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

    <!-- form for administrator input for adding new member -->
    <form class="row container m-auto"  action="add_member.php" method="post">
     
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
            <option value = "Database" name="Navrongo Project">Navrongo Project</option>
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

    <p>
        <center>
            <div class="col-4 d-flex flex-column">
                <input class="submit-button" type="submit"  name="SubmitButton" value="Submit">
            </div>
        </center>
    </p>

    
    </form>
    
    <script src="../javascript/formvalidation.js"></script>
</body>
</html>