<?php
    $item  = $_POST["item"];
    $content  = $_POST["content"];

    include "../../config.php";  
    $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
    if (!$content) {
        $content = "";   // Lookup All (it will be used with LIKE)
    }
    if ($item == 'store'){
        $sql = "SELECT * FROM Store WHERE name LIKE '%".$content."%'";
    }
    else {
        $sql = "SELECT * FROM Menu WHERE name LIKE '%".$content."%'";
    }
    $result = mysqli_query($con, $sql);

    // Generate HTML of content li tag list 
    if (mysqli_num_rows($result) > 0) { 
        if ($item == 'store') {
            while($row = $result->fetch_assoc()) {  
                echo '<li value="'.$row["name"].'">
                <span>'.$row["name"].'<span>
                <span>'.$row["category"].'<span>
                <span>'.$row["address"].'<span> 
                <span>'.$row["detail"].'</span>
                </li>'; 
            }
        }
        else {
            while($row = $result->fetch_assoc()) {  
                echo '<li value="'.$row["name"].'">
                <span>'.$row["name"].'<span>
                <span>'.$row["store"].'<span>
                <span>'.$row["price"].'</span>
                <span>'.$row["detail"].'<span>
                </li>'; 
            }
        }
    }else { 
        echo '<li value="">No search terms found!</li>'; 
    } 
    // mysqli_close($con);
?>

