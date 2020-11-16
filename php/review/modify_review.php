<?php
    $id = $_GET["id"];
    $page = $_GET["page"];

    $title = $_POST["title"];
    $content = $_POST["content"];
    $grade = $_POST["grade"];
          
    include "../../config.php";
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
    $sql = "UPDATE Review SET title='$title', content='$content', grade='$grade' ";
    $sql .= "WHERE id=$id";
    mysqli_query($con, $sql);
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'list_review_html.php?page=$page';
	      </script>
	  ";
?>