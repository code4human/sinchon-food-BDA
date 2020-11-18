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
            <ul>
                <li id="ana_box_1" class="box">
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
                                <span><?=$row["category"]?></span>
                    <?php
                            }
                        }
                        else {
                            echo "sql query has failed";
                        }
                    ?>
                    </div>
                </li>
                <li id="ana_box_2" class="box">
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
                                <span><?=$row["name"]?></span>
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
                    <h3>Restaurants With The Highest Average Grade</h3>
                    <div>
                    <?php
                        $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_highest_rate_avg_store.sql";
                        $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                        $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
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
            </ul>
            <ul>
                <li id="ana_box_4" class="box">
                    <h3>Where influencer recently visited</h3>
                    <div>	    	
                    </div>
                </li>
                <li id="ana_box_5" class="box">
                    <h3>Worst Restaurant</h3>
                    <div>	    	
                    </div>
                </li>
                <li id="ana_box_6" class="box">
                    <h3>Best Restaurant</h3>
                    <div>	    	
                    </div>
                </li>
            </ul>
            <ul>
                <li id="ana_box_7" class="box">
                    <h3>A Restaurant that You May Wonder</h3>
                    <div>
                        회원이 안 가본 곳이 있다면 
                    </div>
                </li>
                <li id="ana_box_8" class="box">
                    <h3>A Restaurant You Might Like</h3>
                    <div>
                        회원이 리뷰를 많이 남긴 카테고리(ex.태국식)에서 가장 많은 리뷰(or grade AVG 최상)를
                        갖는 가게 추천 	
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

