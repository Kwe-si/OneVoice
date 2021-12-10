<?php
require "../php/database_connection_test.php";

$mid = $_POST['ID'];


function listing($conn,$mid){
    $mem_details=mysqli_query($conn, "SELECT P.personID, M.memID, Ev.eventID, DP.devID, P.fname, P.middlename, P.lname, P.contact, P.nationality, P.residential_address, P.DOB, D.deptName, D.deptNum, DP.projectName,
    DPM.projectrole, Ev.eventName, Evm.eventrole,
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
    Inner Join DevelopmentProject as DP on DP.devID=DPM.devID
    WHERE M.memID = '$mid'");
    $data=mysqli_fetch_all($mem_details,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;

}

// echo listing($conn,$pid);
echo json_encode(listing($conn,$mid));


?>