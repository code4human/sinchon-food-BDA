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
    $pub_date = date("Y-m-d", time());  // save the current date to formated string

    // image file processing
    // Do not save image files : INSERT INTO Review (image) VALUES ('$uploaded_image');
    /*
    $upload_dir = './data/';

	$image_name	 = $_FILES["image"]["name"];
	$image_tmp_name = $_FILES["image"]["tmp_name"];
	// $image_type     = $_FILES["image"]["type"];   // Non-image files has not yet been blocked
	$image_size     = $_FILES["image"]["size"];
	$image_error    = $_FILES["image"]["error"];

	if ($image_name && !$image_error)
	{
		$image = explode(".", $image_name);
		$image_name = $image[0];
		$image_ext  = $image[1];

		$new_image_name = date("Y-m-d", time());
		$copied_image_name = $new_image_name.".".$image_ext;      
		$uploaded_image = $upload_dir.$copied_image_name;

		if( $image_size  > 1000000 ) {
				echo("
				<script>
				alert('The upload file size exceeds the specified capacity (1MB)!');
				history.go(-1)
				</script>
				");
				exit;
		}

		if (!move_uploaded_file($image_tmp_name, $uploaded_image) )
		{
				echo("
					<script>
					alert('Failed to copy files to the specified directory.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
	else 
	{
		$image_name      = "";
		$image_type      = "";
		$copied_image_name = "";
    }
    */

    include "../../config.php";  
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php

    // the menu FK is menu id, not menu name. 
    $sql = "SELECT id FROM Menu WHERE store='$store' AND name='$menu'";
    $result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$menu_id = isset($row) ? $row["id"] : NULL;   // handle exception

    $sql = "INSERT INTO Review (user, store, menu, title, content, rate_star, pub_date) ";
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

  
