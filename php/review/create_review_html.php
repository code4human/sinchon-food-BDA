<!DOCTYPE html>
<html>
<head> 
	<title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/create_review.css">
	<script type="text/javascript" src="../../js/create_review.js?"></script>
	<!--ajax using jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#store').on('change', function(){
			let storeName = $(this).val();
			if (storeName){
				$.ajax({
					type: 'POST',
					url: 'ajax_select_data.php',
					data: 'store_name='+storeName,
					success:function(html) {
						$('#store').html('<option value="'+storeName+'">'+storeName+'</option>');
						$('#menu').html(html);
					}
				});
			} 
			else {
				$('#store').html('<option value="">=Select Store=</option>');
				$('#menu').html('<option value="">=Select Menu=</option>');
			}
		});
	})
	</script>
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
		<div id="review_box">
			<h2>Write a Review</h2>
			<form name="review_form" method="post" action="create_review.php" enctype="multipart/form-data">
				<div class="form nickname">
					<div class="text">Your Nickname</div>
					<div class="user"><?=$usernickname?></div>
				</div>
				<div class="form store">
					<div class="text">Store</div>
					<div class="input">
						<select name="store" id="store">
							<option value="">=Select Store=</option>
							<?php 
								include "../../config.php";
								$con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
								$sql = "SELECT name FROM Store";
								$result = mysqli_query($con, $sql);   // execute $sql
								// `$row = mysqli_fetch_array($result)` does not work. 
								while ($row = $result->fetch_assoc()) {?>
									<option class="option" value="<?php echo $row['name']?>">
										<?php echo $row['name'];?>
									</option>
								<?php }?>
						</select>
					</div>
				</div>
				<div class="form menu">
					<div class="text">Menu</div>
					<div class="input">
						<select name="menu" id="menu" class="select">
							<option value="">=Select Menu=</option>
						</select>
					</div>
				</div>
				<div class="form title">
					<div class="text">Title</div>
					<div class="input">
						<input type="text" name="title" style="padding: 2px 8px; width: 97%; height: 25px; border-radius: 4px; border: 1px solid #dbdbdb;">
					</div>
				</div>
				<div class="form content">
					<div class="text">Content</div>
					<div class="input">
						<textarea name="content"></textarea>
					</div>
				</div>
				<div class="form grade">
					<div class="text">Grade (1 ~ 5)</div>
					<div class="input">
						<select name="grade" class="select">
							<option value="">=Select Grade=</option>
							<option value="1">1</option><option value="2">2</option>
							<option value="3">3</option><option value="4">4</option><option value="5">5</option>
						</select>
					</div>
				</div>
				<div class="form image">
					<div class="text">Image</div>
					<div class="input">
						<input type="file" name="image" class="file">
					</div>
				</div>
				<div class="buttons">
					<input type="button" class="button list" value="See List" onclick="location.href='list_review_html.php'">
					<input type="button" class="button" value="Save" onclick="check_input()">
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
