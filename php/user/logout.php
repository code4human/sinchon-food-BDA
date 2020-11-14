<?php
  session_start();
  unset($_SESSION["useremail"]);
  unset($_SESSION["usernickname"]);
  unset($_SESSION["userpoint"]);
  
  echo("
       <script>
          location.href = 'http://localhost/index.php';
         </script>
       ");
?>
