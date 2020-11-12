<!DOCTYPE html>
<html>
<head> 
    <title>Sinchon Food BDA</title>
    <link rel="stylesheet" type="text/css" href="../../css/user.css">
    <script>
    function check_input() {
        if ((!document.user_form.email1.value) || (!document.user_form.email2.value) ) {
            alert("Please fill the email form!");
            document.user_form.email1.focus();
            return;
        }

        else if (!document.user_form.pass.value) {
            alert("Please fill the password form!");    
            document.user_form.pass.focus();
            return;
        }

        else if (!document.user_form.pass_confirm.value) {
            alert("Please confirm the password form!");    
            document.user_form.pass_confirm.focus();
            return;
        }

        else if (!document.user_form.nickname.value) {
            alert("Please fill the nickname form!");    
            document.user_form.nickname.focus();
            return;
        }

        if (document.user_form.pass.value != 
                document.user_form.pass_confirm.value) {
            alert("Passwords do not match.\nPlease refill!");
            document.user_form.pass.focus();
            document.user_form.pass.select();
            return;
        }

        document.user_form.submit();   // form action="create.php"
    }

    function reset_form() {
        document.user_form.email1.value = "";
        document.user_form.email2.value = "";
        document.user_form.pass.value = "";
        document.user_form.pass_confirm.value = "";
        document.user_form.nickname.value = "";
        document.user_form.email1.focus();
        return;
    }

    function check_email() {
        window.open("check.php?email=" + document.user_form.email1.value + "@" + document.user_form.email2.value,
            "emailcheck",
            "width=300,height=180,scrollbars=no,resizable=yes");
    }
    </script>
</head>
<body> 
	<header>
    	<?php include "../header.php";?>
    </header>
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      	<div id="signup_box">
            <h2>Sign Up</h2>
          	<form name="user_form" method="post" action="create.php">
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

