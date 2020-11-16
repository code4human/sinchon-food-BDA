<!DOCTYPE html>
<html>
<head> 
	<title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/list_review.css">
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
      		<div id="review_list_box">
                <h2>Review List</h2>
                <ul id="review_list">
					<li>
						<span class="li_num">Number</span>
						<span class="li_tit">Title</span>
						<span class="li_sto">Store</span>
						<span class="li_wri">Writer</span>
						<span class="li_pub">Published</span>
						<span class="li_hit">Hits</span>
					</li>
					<?php
					if (isset($_GET["page"]))
						$page = $_GET["page"];
					else
						$page = 1;

					include "../../config.php";
					$con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
					$sql = "SELECT * FROM Review ORDER BY id DESC";
					$result = mysqli_query($con, $sql);
					$total_num_review = mysqli_num_rows($result);   // total number of reviews
					$unit = 10;   // page unit (10 reviews)

					// count the total number of pages ($total_num_page)
					if ($total_num_review % $unit == 0)     
						$total_num_page = floor($total_num_review/$unit);      
					else
						$total_num_page = floor($total_num_review/$unit) + 1; 
				
					// count the $start depending on displaying page($page)
					$start = ($page - 1) * $unit;      
					$number = $total_num_review - $start;

					for ($i=$start; $i<$start+$unit && $i < $total_num_review; $i++)
					{
						mysqli_data_seek($result, $i);
						// move the pointer to record to import
						$row = mysqli_fetch_array($result);
						// fetch one record
						$id = $row["id"];
						$user = $row["user"];
						$store = $row["store"];
						$title = $row["title"];
						$rate_star = $row["rate_star"];
						$pub_date = $row["pub_date"];
						$hit = $row["hit"];
					?>
					<li>
						<span class="li_num"><?=$id?></span>
						<span class="li_tit"><a href="get_review_html.php?id=<?=$id?>&page=<?=$page?>"><?=$title?></a></span>
						<span class="li_sto"><?=$store?></span>
						<span class="li_wri"><?=$user?></span>
						<span class="li_pub"><?=$pub_date?></span>
						<span class="li_hit"><?=$hit?></span>
					</li>	
					<?php
						$number--;
					}
					mysqli_close($con);
					?>	
				</ul>
				<ul id="page_num">
				<?php
				if ($total_num_page>=2 && $page >= 2)	
				{
					$new_page = $page-1;
					echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
				}		
				else 
					echo "<li>&nbsp;</li>";

				// print page link numbers at the bottom of the review list
				for ($i=1; $i<=$total_num_page; $i++)
				{
					if ($page == $i)     // do not link current page number
					{
						echo "<li><b> $i </b></li>";
					}
					else
					{
						echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
					}
				}
				if ($total_num_page>=2 && $page != $total_num_page)		
				{
					$new_page = $page+1;	
					echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
				}
				else 
					echo "<li>&nbsp;</li>";
			?>
				</ul>	
				<ul class="buttons">
					<li><button onclick="location.href='list_review_html.php'">Review List</button></li>
					<li>
					<?php 
						if($usernickname) {
					?>
						<button onclick="location.href='create_review_html.php'">Write a Review</button>
					<?php
						} 
						else {
					?>
						<a href="javascript:alert('You can write a review after sign in!')"><button>Write a Review</button></a>
					<?php
						}
					?>
					</li>
				</ul>
    		</div>
        </div>
	</section>
	<footer>
    	<?php include "../footer.php";?>
    </footer>
</body>
</html>

