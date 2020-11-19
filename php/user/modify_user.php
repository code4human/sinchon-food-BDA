<?php
    $email = $_GET["email"];   // received value from the action of user_form in modify_user_html.php

    $pass = $_POST["pass"];
    $nickname = $_POST["nickname"];
          
    include "../../config.php";  
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
    $sql = "UPDATE User SET pass='$pass', nickname='$nickname' WHERE email='$email'";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	      <script>
	          location.href = '../../index.php';
	      </script>
      ";
?>

   
