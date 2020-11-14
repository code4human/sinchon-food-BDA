<?php
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    include "../../config.php";
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
    $sql = "select * from user where email='$email'";
    $result = mysqli_query($con, $sql);
    $num_match = mysqli_num_rows($result);

    if(!$num_match) 
    {
      echo("
            <script>
              window.alert('You are an unregistered user!')
              history.go(-1)
            </script>
          ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass != $db_pass)
        {
           echo("
              <script>
                window.alert('Incorrect password!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["useremail"] = $row["email"];
            $_SESSION["usernickname"] = $row["nickname"];
            $_SESSION["userpoint"] = $row["point"];

            echo("
              <script>
                location.href = '../../index.php';
              </script>
            ");
        }
     }        
?>
