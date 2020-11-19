<!DOCTYPE html>
<html>
<head> 
    <title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/create_review.css">
    <script type="text/javascript" src="../../js/modify_review.js?"></script>
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
                <h2>Modify the Review</h2>
        <?php
            $id  = $_GET["id"];
            $page = $_GET["page"];
            
            include "../../config.php";
			$con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
            $sql = "SELECT * FROM Review WHERE id=$id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $user = $row["user"];
            $store = $row["store_name"];
            $menu  = $row["menu_id"];
            $title = $row["title"];
            $content = $row["content"];
            $image = $row["image"];
            $grade = $row["grade"];
        ?>
                <form name="review_form" method="post" action="modify_review.php?id=<?=$id?>&page=<?=$page?>" enctype="multipart/form-data">
                    <div class="form nickname">
                        <div class="text">Your Nickname</div>
                        <div class="user"><?=$usernickname?></div>
                    </div>
                    <div class="form store">
                        <div class="text">Store</div>
                        <div class="store"><?=$store?></div>
                    </div>
                    <div class="form menu">
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
                    <div class="form title">
					    <div class="text">Title</div>
                        <div class="input">
                            <input type="text" name="title" value="<?=$title?>" style="padding: 2px 8px; width: 97%; height: 25px; border-radius: 4px; border: 1px solid #dbdbdb;">
                        </div>
                    </div>
                    <div class="form content">
					    <div class="text">Content</div>
                        <div class="input">
                            <input type="text" name="content" value="<?=$content?>">
                        </div>
                    </div>
                    <div class="form image">
                        <div class="text">Image</div>
                        <?php 
                        if($image) { ?>
                            <div class="image"><?=$image?></div>
                        <?php }
                        else {
                            echo "<span>No Image<span>";
                        }?> 
                    </div>
                    <div class="form grade">
					    <div class="text">Grade (1 ~ 5)</div>
                        <div class="input">
                            <select name="grade" class="select">
                                <option value="">=Select Grade=</option>
                                <option value="1">1</option><option value="2">2</option>
                                <option value="3">3</option><option value="4">4</option><option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="buttons">
					    <input type="button" class="button list" value="Back to List" onclick="location.href='list_review_html.php'">
					    <input type="button" class="button" value="Save" onclick="check_input()">
				    </div>
                </form>
            </div>
        </div>
    </section> 
    <footer>
        <?php include "../footer.php";?>
    </footer>
    </body>
</html>
