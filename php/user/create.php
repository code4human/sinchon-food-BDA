<?php
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $pass = $_POST["pass"];
    $nickname = $_POST["nickname"];

    $email = $email1."@".$email2;
    $signup_date = date("Y-m-d", time());  // save the current date to formated string

    include('../../config.php');  
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
	$sql = "insert into user(email, pass, nickname, signup_date, point) ";
	$sql .= "values('$email', '$pass', '$nickname', '$signup_date', 0)";

	mysqli_query($con, $sql);  // execute $sql
    mysqli_close($con);

    echo "
	      <script>
	          location.href = '../../index.php';
	      </script>
	  ";
?>

   
