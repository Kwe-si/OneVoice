<?php

//session_start();
require "./php/database_credentials.php";
$error = "";
  if (isset($_POST['submit']))  {
$conn = new mysqli(servername,username,password,dbname);


if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
	echo "Connection failed";
}
else {
	$Email = $_POST["u"];
	$Password=$_POST["p"];

    
	$stmt = $conn -> prepare("SELECT * FROM `login` WHERE `Email`=? AND `Password`=? ");
	$stmt -> bind_param("ss",$Email,$Password);
	
    $user = null;
    $stmt->execute();

    $result = $stmt->get_result();

    if($result -> fetch_assoc()) {
        header( 'Location: ./php/home.php');
        
    }
    else {
        $error = " Please Check your credentials and Try again";
    }

        
    }
    }
?>


<link rel="stylesheet" type="text/css" href="./css/login.css">

<!DOCTYPE html><html lang='en' class=''>
<head>
	


</style>
</head>
<body login-body>
    <div class="login">
        <h1>Onevoice Login</h1>
        <form method="post" name="form" id="form" action="index.php">
            <input type="text" name="u" placeholder="Username" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <button name="submit" type="submit" class="btn btn-primary btn-block btn-large">Login</button>
        </form>
    </div>
    <?php if ($error){ ?>
        <p style="color:white;margin:500px;margin-left:570px; " ><?php echo $error ?> </p> 

    <?php }?>

</body>
</html>



