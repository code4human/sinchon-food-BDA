<?php
    session_start();
    if (isset($_SESSION["useremail"])) {
        $useremail = $_SESSION["useremail"];
        include $_SERVER["DOCUMENT_ROOT"]."/config.php";   // absolute path of config.php
        $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
        $sql = "SELECT point FROM User WHERE email='$useremail'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $userpoint = isset($row) ? $row["point"] : 0;
    }
    else $useremail = "";
    if (isset($_SESSION["usernickname"]))
        $usernickname = $_SESSION["usernickname"];
    else $usernickname = "";
?>
        <div id="header_content">
            <h2>
                <a href="http://localhost/index.php">Sinchon Food BDA</a>
            </h2>
            <p id="header_button">
<?php
    if(!$useremail) {
?>                
                <span><a href="http://localhost/php/user/create_html.php">Sign Up</a> </span>
                <span> | </span>
                <span><a href="http://localhost/php/user/login_html.php">Log In</a></span>
<?php
    } else {
                $logged = "Hi, ".$usernickname."! [Point:".$userpoint."]";
?>
                <span><?=$logged?> </span>
                <span> | </span>
                <span><a href="http://localhost/php/user/logout.php">Log Out</a> </span>
                <span> | </span>
                <span><a href="http://localhost/php/user/modify_html.php">Modify Personal Info</a></span>
<?php
    }
?>
            </p>
        </div>
        <div id="menu_bar">
            <div class="menu_div">
                <div><a href="http://localhost/index.php">Recent Activity</a></div>
                <div><a href="#">Search</a></div>                                
                <div><a href="#">Analysis</a></div>
                <div><a href="http://localhost/php/review/list_review_html.php">Reviews</a></div>
            </div>
        </div>