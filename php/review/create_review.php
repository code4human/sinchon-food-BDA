<?php
    session_start();
    if (isset($_SESSION["useremail"])) 
        $useremail = $_SESSION["useremail"];
    else $useremail = "";
    if (isset($_SESSION["usernickname"])) 
        $usernickname = $_SESSION["usernickname"];
    else $usernickname = "";

    if (!$useremail)
    {
        echo("
            <script>
            alert('You can write a review after sign in!');
            history.go(-1)
            </script>
        ");
        exit;
    }
    $store = $_POST["store"];
    $menu = $_POST["menu"];
    $title = $_POST["title"];
    $content = $_POST["content"];
	$grade = $_POST["grade"];
	date_default_timezone_set('Asia/Seoul');
    $pub_date = date("Y-m-d H:i:s", time());  // save the current date and hour to formated string

    // Do not save image file because of no processing the file

    include "../../config.php";  
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php

    // the menu FK is menu id, not menu name. 
    $sql = "SELECT id FROM Menu WHERE store_name='$store' AND name='$menu'";
    $result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$menu_id = isset($row) ? $row["id"] : NULL;   // handle exception

    $sql = "INSERT INTO Review (user_nickname, store_name, menu_id, title, content, grade, pub_date) ";
	$sql .= "VALUES ('$usernickname', '$store', $menu_id, '$title', '$content', '$grade', '$pub_date')";
	mysqli_query($con, $sql);   // execute $sql

	// add 100 points to writer (if mysqli_fetch_array() does not fail)
	if ($menu_id) {
		$sql = "SELECT point FROM User where email='$useremail'";
		$result = mysqli_query($con, $sql);
		$row = $result->fetch_assoc();
		$new_point = $row["point"] + 100;
		
		$sql = "UPDATE User SET point=$new_point where email='$useremail'";
		mysqli_query($con, $sql);
	}
	else {
		echo '<script>alert("Your review was not written due to failure of mysqli_fetch_array(). Please try again.");</script>';
	}
	mysqli_close($con); 

	echo "
	   <script>
	    location.href = 'list_review_html.php';
	   </script>
	";
?>

  
