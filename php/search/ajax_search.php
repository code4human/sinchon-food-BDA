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
            echo '<div class="result_title">
                <h4 class="li_store_nam">Store Name</h4>
                <h4 class="li_cat">Category</h4>
                <h4 class="li_add">Address</h4>
                <h4 class="li_det">Detail</h4>
            </div>';
            while($row = $result->fetch_assoc()) {  
                echo '<li value="'.$row["name"].'">
                    <span class="li_store_nam">'.$row["name"].'</span>
                    <span class="li_cat">'.$row["category"].'</span>
                    <span class="li_add">'.$row["address"].'</span>
                    <span class="li_det">'.$row["detail"].'</span>
                </li>'; 
            }
        }
        else {
            echo '<div class="result_title">
                <h4 class="li_menu_nam">Menu Name</h4>
                <h4 class="li_sto">Category</h4>
                <h4 class="li_pri">Address</h4>
                <h4 class="li_det">Detail</h4>
            </div>';
            while($row = $result->fetch_assoc()) {  
                echo '<li value="'.$row["name"].'">
                    <span class="li_menu_nam">'.$row["name"].'</span>
                    <span class="li_sto">'.$row["store"].'</span>
                    <span class="li_pri">'.$row["price"].'</span>
                    <span class="li_det">'.$row["detail"].'</span>
                </li>'; 
            }
        }
    }else { 
        echo '<li value="">No search terms found!</li>'; 
    } 
    // mysqli_close($con);
?>

