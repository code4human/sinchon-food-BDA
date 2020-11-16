<!DOCTYPE html>
<html>
<head> 
    <title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/create_review.css">
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
            <div id="review_box">
                <h2 class="title">
                    Read a Review
                </h2>
        <?php
            $id = $_GET["id"];
            $page = $_GET["page"];

            include "../../config.php";
            $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
            $sql = "SELECT * FROM Review WHERE id=$id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $id = $row["id"];
            $user = $row["user"];
            $store = $row["store"];
            $menu = $row["menu"];
            $title = $row["title"];
            $content = $row["content"];
            $image = $row["image"];
            $rate_star = $row["rate_star"];
            $pub_date = $row["pub_date"];
            $hit = $row["hit"];

            // process the blank of content
            $content = str_replace(" ", "&nbsp;", $content);
            $content = str_replace("\n", "<br>", $content);

            // add 1 hit
            $new_hit = $hit + 1;
            $sql = "UPDATE Review SET hit=$new_hit WHERE id=$id";
            mysqli_query($con, $sql);
        ?>
                <div id="review_content">
                    <div>
                        <span class="col1"><b>Title :</b> <?=$title?></span>
                        <span class="col2"><?=$user?> | <?=$pub_date?></span>
                    </div>
                    <div>
                        <?php
                            if(!$image) {
                                echo "<span>No Image<span>";
                            }
                        ?>
                    <div>
                    <div>
                        <?=$content?>
                    </div>		
                </div>
                <div class="buttons">
                    <input type="button" class="button list" value="See List" onclick="location.href='list_review_html.php?page=<?=$page?>'">
                    <input type="button" class="button modify" value="Modify" onclick="location.href='modify_review_html.php?page=<?=$page?>'">
                    <input type="button" class="button delete" value="Delete" onclick="location.href='delete_review.php?page=<?=$page?>'">
                    <input type="button" class="button write" value="Write a Review" onclick="location.href='create_review_html.php'">
                </div>
            </div>
        </div>
    </section> 
    <footer>
        <?php include "../footer.php";?>
    </footer>
</body>
</html>