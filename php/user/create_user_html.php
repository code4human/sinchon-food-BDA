<!DOCTYPE html>
<html>
<head> 
    <title>Sinchon Food BDA</title>
    <link rel="stylesheet" type="text/css" href="../../css/common.css">
    <link rel="stylesheet" type="text/css" href="../../css/create_user_html.css">
    <script type="text/javascript" src="../../js/create_user.js"></script>
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
      	<div id="signup_box">
            <h2>Sign Up</h2>
          	<form name="user_form" method="post" action="create_user.php">
                <div class="form email">
                    <div class="text">Email Address</div>
                    <div class="input">
                        <input type="text" name="email1">@<input type="text" name="email2">
                        <input type="button" class="button check" value="Check" onclick="check_email()">
                    </div>                 
                </div>

                <div class="form">
                    <div class="text">Password</div>
                    <div class="input">
                        <input type="password" name="pass">
                    </div>                 
                </div>

                <div class="form">
                    <div class="text">Confirm Password</div>
                    <div class="input">
                        <input type="password" name="pass_confirm">
                    </div>                 
                </div>

                <div class="form">
                    <div class="text">Nickname</div>
                    <div class="input">
                        <input type="text" name="nickname">
                    </div>                 
                </div>

                <div class="buttons">
                    <input type="button" class="button reset" value="Reset" onclick="reset_form()">
                    <input type="button" class="button" value="Sign Up" onclick="check_input()">
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

