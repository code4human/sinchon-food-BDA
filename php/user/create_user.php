<?php
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $pass = $_POST["pass"];
    $nickname = $_POST["nickname"];

    $email = $email1."@".$email2;
    date_default_timezone_set('Asia/Seoul');
    $signup_date = date("Y-m-d H:i:s", time());  // save the current date and hour to formated string

    include "../../config.php";  
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
	$sql = "INSERT INTO User(email, pass, nickname, signup_date, point) ";
	$sql .= "VALUES('$email', '$pass', '$nickname', '$signup_date', 0)";

	mysqli_query($con, $sql);  // execute $sql
    mysqli_close($con);

    echo "
	      <script>
	          location.href = '../../index.php';
	      </script>
	  ";
?>

   
