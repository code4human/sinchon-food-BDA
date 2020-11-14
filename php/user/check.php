<!DOCTYPE html>
<head>
   <style>
      #close .button {
         width: 64px; height: 32px; padding: 3px 2px;
         border: none; border-radius: 4px; 
         background-color: #808080; color: #ffffff;
         text-align: center;
         font-size: 0.875rem; font-weight: 400;
         cursor: pointer;
      }
   </style>
</head>
<body>
<h2>Email Check</h2>
<div>
<?php
   $email = $_GET["email"];
   $email_split = explode('@', $email);   // split left text and right text by '@'
   if(($email == "@") || (!$email_split[0]) || (!$email_split[1]))
   {
      echo("<p>Please fill the email!</p>");
   }
   else
   {
      include "../../config.php";
      $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
      $sql = "select * from user where email='$email'";
      $result = mysqli_query($con, $sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo "<p> '".$email."' is already in use.</p>";
         echo "<p>Please use a different email address.</p>";
      }
      else
      {
         echo "<p>You can use '".$email."'</p>";
      }
    
      mysqli_close($con);
   }
?>
</div>
<div id="close">
   <input type="button" class="button" value="Close" onclick="javascript:self.close()">
</div>
</body>
</html>

