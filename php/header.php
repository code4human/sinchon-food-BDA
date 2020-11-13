<?php
    session_start();
    if (isset($_SESSION["useremail"]))
        $useremail = $_SESSION["useremail"];
    else $useremail = "";
    if (isset($_SESSION["usernickname"]))
        $usernickname = $_SESSION["usernickname"];
    else $usernickname = "";
    if (isset($_SESSION["userpoint"]))
        $userpoint = $_SESSION["userpoint"];
    else $userpoint = 0;
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
                <span><a href="http://localhost/php/user/user_modify_form.php">Modify Personal Info</a></span>
<?php
    }
?>
            </p>
        </div>
        <div id="menu_bar">
            <div class="menu_span">
                <div><a href="http://localhost/index.php">Best Restaurants</a></div>
                <div><a href="message_form.php">Search</a></div>                                
                <div><a href="board_form.php">Analysis</a></div>
                <div><a href="index.php">Reviews</a></div>
            </div>
        </div>