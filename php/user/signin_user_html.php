<!DOCTYPE html>
<html>
<head> 
	<title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/signin_user_html.css">
	<script type="text/javascript" src="../../js/signin.js"></script>
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
      		<div id="login_box">
				<h2>Log In</h2>
				<form name="login_form" method="post" action="signin_user.php">
					<div class="form email">
						<div class="text">Email Address</div>
						<div class="input">
							<input type="text" name="email">
						</div>
					</div>
					<div class="form">
						<div class="text">Password</div>
						<div class="input">
							<input type="password" name="pass">
						</div>
                	</div>
					<div class="buttons">
                    	<input type="button" class="button" value="Log In" onclick="check_input()">
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

