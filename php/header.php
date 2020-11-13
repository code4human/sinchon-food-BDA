<?php
    session_start();
    if (isset($_SESSION["userid"])) 
        $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) 
        $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userpoint"])) 
        $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
        <div id="top">
            <h3>
                <a href="./index.php">Sinchon Food BDA</a>
            </h3>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <span><a href="http://localhost/php/user/create_html.php">Sign Up</a> </span>
                <span> | </span>
                <span><a href="http://localhost/php/user/login_html.php">Log In</a></span>
<?php
    } else {
                $logged = $username."(".$userid.")님[Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="http://localhost/php/user/logout.php">Log Out</a> </li>
                <li> | </li>
                <li><a href="http://localhost/php/user/user_modify_form.php">Modify Personal Info</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="http://localhost/index.php">HOME</a></li>
                <li><a href="message_form.php">쪽지 만들기</a></li>                                
                <li><a href="board_form.php">게시판 만들기</a></li>
                <li><a href="index.php">사이트 완성하기</a></li>
            </ul>
        </div>