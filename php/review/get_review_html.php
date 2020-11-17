<!DOCTYPE html>
<html>
<head> 
    <title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/get_review.css">
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
                <h2>Read a Review</h2>
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
            $grade = $row["rate_star"];
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
                    <div class="info">
                        <div class="text">Writer</div>
                        <div class="user"><?=$user?></div>
                    </div>
                    <div class="info">
                        <div class="text">Store</div>
                        <div class="store"><?=$store?></div>
                    </div>
                    <div class="info">
                        <div class="text">Menu</div>
                        <?php 
                        if($menu) { 
                            // read the sql file
                            $sqlFileToExecute = '../../sql/join_review_menu.sql';
                            $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                            $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                            $arr = explode("__", $sql);
                            $sql = $arr[0].$id.$arr[1];
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            $menu_name = $row["name"];
                            fclose($f);
                            ?>
                            <div class="menu"><?=$menu_name?></div>
                        <?php }
                        else {
                            echo "<span>No Menu<span>";
                        }?> 
                    </div>
                    <div class="info">
                        <div class="text">Title</div>
                        <div class="title"><?=$title?></div>
                    </div>
                    <div class="info">
                        <div class="text">Content</div>
                        <div class="content"><?=$content?></div>
                    </div>
                    <div class="info">
                        <div class="text">Image</div>
                        <?php
                        if(!$image) {
                            echo "<span>No Image<span>";
                        }
                        ?>
                    </div>
                    <div class="info">
                        <div class="text">Grade</div>
                        <div class="grade"><?=$grade?></div>
                    </div>
                    <div class="info">
                        <div class="text">Published Date</div>
                        <div class="pub_date"><?=$pub_date?></div>
                    </div>
                    <div class="info">
                        <div class="text">Number of Hits</div>
                        <div class="hit"><?=$hit?></div>
                    </div>
                    <div class="buttons">
                <?php
                    if (isset($_SESSION["usernickname"]) && ($_SESSION["usernickname"] == $user)) {?>
                        <input type="button" class="button list" value="See List" onclick="location.href='list_review_html.php?page=<?=$page?>'">
                        <input type="button" class="button modify" value="Modify" onclick="location.href='modify_review_html.php?id=<?=$id?>&page=<?=$page?>'">
                        <input type="button" class="button delete" value="Delete" onclick="location.href='delete_review.php?id=<?=$id?>&page=<?=$page?>'">
                        <input type="button" class="button write" value="Write a Review" onclick="location.href='create_review_html.php'">
                    <?php
                    }
                    else {
                    ?>
                        <input type="button" class="button list" value="See List" onclick="location.href='list_review_html.php?page=<?=$page?>'">
                        <input type="button" class="button write" value="Write a Review" onclick="location.href='create_review_html.php'">
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <footer>
        <?php include "../footer.php";?>
    </footer>
</body>
</html>