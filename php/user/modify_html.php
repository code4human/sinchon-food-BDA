<!DOCTYPE html>
<html>
<head>
	<title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/create.css">
	<script type="text/javascript" src="../../js/modify.js"></script>
</head>
<body> 
	<header>
		<?php include "../header.php";?>
    </header>
<?php
    include "../../config.php";
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
	$sql = "SELECT * FROM User WHERE email='$useremail'";   // imported variables in header.php
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

	$nickname = $row["nickname"];
	$pass = $row["pass"];
	$point = $row["point"];
    $email_split = explode('@', $row["email"]);   // split left text and right text by '@'
    $email1 = $email_split[0];
    $email2 = $email_split[1];

    mysqli_close($con);
?>
	<section>
		<div id="main_img" style="height: 200px; text-align: center; background-color: #FFE4B5;">
            <img src="../../img/banner.png" style="float: center; max-height: 200px; width: auto;">
        </div>
        <div id="main_content">
      	<div id="signup_box">
		  	<h2>Modify Personal Info</h2>
          	<form  name="user_form" method="post" action="modify.php?email=<?=$useremail?>">
				<div class="form email">
					<div class="text">Email Address</div>
					<div class="input">
						<?=$useremail?>   <!-- email field is read-only info -->
					</div>                 
				</div>

				<div class="form">
					<div class="text">Password</div>
					<div class="input">
						<input type="password" name="pass" value="<?=$pass?>">
					</div>                 
				</div>

				<div class="form">
					<div class="text">Confirm Password</div>
					<div class="input">
						<input type="password" name="pass_confirm" value="<?=$pass?>">
					</div>                 
				</div>

				<div class="form">
					<div class="text">Nickname</div>
					<div class="input">
						<input type="text" name="nickname" value="<?=$nickname?>">
					</div>                 
				</div>

				<div class="form">
					<div class="text">Point</div>
					<div class="input">
						<?=$point?>   <!-- point field is read-only info -->
					</div>                 
				</div>

				<div class="buttons">
					<input type="button" class="button reset" value="Reset" onclick="reset_form()">
                    <input type="button" class="button" value="Modify" onclick="check_input()">
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

