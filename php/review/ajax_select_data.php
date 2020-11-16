<?php 
if(!empty($_POST["store_name"])){
    include "../../config.php";
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
    // Fetch menu data based on the specific store name
    $sql = "SELECT * FROM Menu WHERE store = '".$_POST["store_name"]."'";   // AND status = 1 ORDER BY name ASC";
    $result = mysqli_query($con, $sql);
     
    // Generate HTML of menu options list 
    if(mysqli_num_rows($result) > 0){ 
        echo '<option value="">=Select Menu=</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row["name"].'">'.$row["name"].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Menu not available</option>'; 
    } 
}
?>