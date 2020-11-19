        <div id="main_img" style="height: 200px; text-align: center; background-color: #FFE4B5;">
            <img src="../../img/banner.png" style="float: center; max-height: 200px; width: auto;">
        </div>
        <div id="main_content">
            <div id="point_top_box" class="box">
                <h4>Active Users</h4>
                <div id="point_top_list">
                    <ul>
                        <li>
                            <h5 class="li_ran">Rank</h5>
                            <h5 class="li_nic">Nickname</h5>
                            <h5 class="li_poi">Points</h5>
                        </li>
                    </ul>
                    <ul id="point_top_content">
                <?php
                    include $_SERVER["DOCUMENT_ROOT"]."/config.php";   // absolute path of config.php 
                    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
                    $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_point_top.sql";
                    $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                    $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                ?>
                            <li>
                                <span class="li_ran"><?=$row["rank"]?></span>
                                <span class="li_nic"><?=$row["nickname"]?></span>
                                <span class="li_poi"><?=$row["point"]?></span>
                            </li>
                <?php
                        }
                    }
                    else {
                        echo "No Users Yet!";
                    }
                ?>
                    <ul>
                </div>
            </div>
            <div id="recent_box" class="box">
                <h4>Recent Reviews</h4>
                <div id="review_list">
                    <ul>
                        <li>
                            <h5 class="li_tit">Title</h5>
                            <h5 class="li_sto">Store</h5>
                            <h5 class="li_wri">Writer</h5>
                        </li>
                    </ul>
                    <ul id="review_content">
                <?php
                    $sqlFileToExecute = $_SERVER["DOCUMENT_ROOT"]."/sql/select_recent_reviews.sql";
                    $f = fopen($sqlFileToExecute, "r+");   // fopen() returns file pointer to access the file 
                    $sql = fread($f, filesize($sqlFileToExecute));   // Using fread, fetch the content of file
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                ?>
                            <li>
                                <span class="li_tit"><?=$row["title"]?></span>
                                <span class="li_sto"><?=$row["store_name"]?></span>
                                <span class="li_wri"><?=$row["user_nickname"]?></span>
                            </li>
                <?php
                        }
                    }
                    else {
                        echo "No Reviews Yet!";
                    }
                    mysqli_close($con);
                ?>
                    <ul>
                </div>
            </div>
        </div>