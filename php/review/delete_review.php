<?php
    $id = $_GET["id"];
    $page = $_GET["page"];

    include "../../config.php";
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
    $sql = "DELETE FROM Review where id = $id";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'list_review_html.php?page=$page';
	     </script>
	   ";
?>