<!DOCTYPE html>
<html>
<head> 
	<title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/list_analysis.css">
</head>
<body> 
	<header>
    	<?php include "../header.php";?>
    </header>
	<section>
		<div id="main_img" style="height: 200px; text-align: center; background-color: #FFE4B5;">
            <img src="../../img/banner.png" style="float: center; max-height: 200px; width: auto;">
        </div>
        <div id="main_content">
        <?php
            if (isset($_SESSION["usernickname"])) {
        ?>
            <ul id="first_box">
                <li id="ana_box_1" class="box">
                    <h3>A Restaurant You Might Like</h3>
                    <div>
                    <?php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_custom_taste.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $arr = explode("&&", $sql);
                        $sql = $arr[0]."'".$_SESSION["usernickname"]."'".$arr[1];
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            if ($row = mysqli_fetch_array($result)) {
                            ?> <span ><?=$row["name"]?></span>
                    </div>
                </li>
            </ul>
                            <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
            }
            ?>
            <ul id="second_box">
                <li id="ana_box_2" class="box">
                    <h3>Most Reviewed Categories</h3>
                    <div>
                    <?php
                        include "../../config.php";
                        $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_most_reviewed_category.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                                <span><?=$row["category"]?></span><br>
                    <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
                    ?>
                    </div>
                </li>
                <li id="ana_box_3" class="box">
                    <h3>Most Reviewed Restaurants</h3>
                    <div>
                    <?php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_most_reviewed_store.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                                <span><?=$row["name"]?></span><br>
                    <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
                    ?> 	
                    </div>
                </li>
                <li id="ana_box_4" class="box">
                    <h3>High Graded Restaurants</h3>
                    <div>
                    <?php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_highest_rate_avg_store.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                                <span><?=$row["store"]?></span><br>
                    <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
                    ?>    	
                    </div>
                </li>
            </ul>
            <ul id="third_box">
                <li id="ana_box_5" class="box">
                    <h3>Where influencer recently visited</h3><h4>(most active user)</h4>
                    <div>
                    <?php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_influencer_visit.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            if ($row = mysqli_fetch_array($result)) {
                                $pub_date = explode(" ", $row["pub_date"])[0];
                    ?>
                                <span>
                                    <b><?=$row["user"]?></b> left 
                                    <a href='../review/get_review_html.php?id=<?=$row["id"]?>&page='>a review of <b><?=$row["store"]?></b> on <?=$pub_date?></a>
                                </span>
                    <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
                    ?>	    	
                    </div>
                </li>
                <li id="ana_box_6" class="box">
                    <h3>Best Restaurant</h3><h4>(low price, many reviews, high grade)</h4>
                    <div>
                    <?php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_best_store.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            if ($row = mysqli_fetch_array($result)) {
                    ?>
                                <span><?=$row["store"]?></span>
                    <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
                    ?>    	
                    </div>
                </li>
                <li id="ana_box_7" class="box">
                    <h3>Best Review</h3><h4>(high number of hits)</h4>
                    <div>
                    <?php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_best_review.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            if ($row = mysqli_fetch_array($result)) {
                                $pub_date = explode(" ", $row["pub_date"])[0];
                    ?>
                                <span>
                                    <a href='../review/get_review_html.php?id=<?=$row["id"]?>&page='><b><?=$row["user"]?></b>'s review of <b><?=$row["store"]?></b> on <?=$pub_date?> (hits <b><?=$row["hit"]?></b>)</a>
                                </span>
                    <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
                    ?>	    	
                    </div>
                </li>
            </ul>
        </div>
	</section>
	<footer>
    	<?php include "../footer.php";?>
    </footer>
</body>
</html>

