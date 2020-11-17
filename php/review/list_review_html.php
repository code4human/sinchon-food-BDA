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
				<div id="review_list">
					<ul id="review_title">
						<li>
							<h4 class="li_num">Number</h4>
							<h4 class="li_tit">Title</h4>
							<h4 class="li_sto">Store</h4>
							<h4 class="li_wri">Writer</h4>
							<h4 class="li_pub">Published</h4>
							<h4 class="li_hit">Hits</h4>
						</li>
					</ul>
					<ul id="review_content">
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
					<div id="bottom">
						<div id="page_num">
				<?php
				if ($total_num_page>=2 && $page >= 2)	
				{
					$new_page = $page-1;
					echo "<span> <a href='list_review_html.php?page=$new_page'>◀Previous</a>&nbsp</span>";
				}		
				else 
					echo "<span>&nbsp</span>";

				// print page link numbers at the bottom of the review list
				for ($i=1; $i<=$total_num_page; $i++)
				{
					if ($page == $i)     // do not link current page number
					{
						echo "<span> <b>Page$i</b>&nbsp</span>";
					}
					else
					{
						echo "<span> <a href='list_review_html.php?page=$i'>Page$i</a> <span>";
					}
				}
				if ($total_num_page>=2 && $page != $total_num_page)		
				{
					$new_page = $page+1;	
					echo "<span> <a href='list_review_html.php?page=$new_page'>Next▶</a> </span>";
				}
				else 
					echo "<span>&nbsp</span>";
				?>
						</div>	
						<div class="buttons">
							<?php 
							if($usernickname) {?>
								<input type="button" class="button" value="Write a Review" onclick="location.href='create_review_html.php?page=<?=$page?>'">
							<?php
							} 
							else {?>
								<a href="javascript:alert('You can write a review after sign in!')"><input type="button" class="button" value="Write a Review"></a>
							<?php
							}?>
						</div>
					</div>
				</div>
    		</div>
        </div>
	</section>
	<footer>
    	<?php include "../footer.php";?>
    </footer>
</body>
</html>