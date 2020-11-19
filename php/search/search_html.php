<!DOCTYPE html>
<html>
<head> 
	<title>Sinchon Food BDA</title>
	<link rel="stylesheet" type="text/css" href="../../css/common.css">
	<link rel="stylesheet" type="text/css" href="../../css/login.css">
	<!--ajax using jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
	function submit_search() {
		$(document).ready(function(){
			let item = $("#select_box").val();
			let content = $("input").val();
			console.log(item, content);
			if (item){
				$.ajax({
					type: 'POST',
					url: 'ajax_search.php',
					data: 'item='+item+'&content='+content,
					success:function(html) {
						$("#search_list").html(html);
					}
				});
			} 
			else {
				alert('Please fill the select box!');
				document.search_form.item.focus();
			}
		})
	}
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
      		<div id="search_box">
				<h2>Search the Store / Menu</h2>
				<form name="search_form" method="get" action="search.php">
					<div class="form select">
						<div class="input">
							<select name="item" id="select_box">
								<option value="">=Select Search Item=</option>   <!--선택 안하면 오류-->
								<option value="store">Store</option>
								<option value="menu">Menu</option>
							</select>
						</div>
					</div>
					<div class="form content">
						<div class="input">
							<input type="text" name="content" value="" placeholder="Full data lookup without input">
						</div>
					</div>
					<div class="buttons">
						<input type="button" class="button" value="Search" onclick="submit_search()">
                	</div>	    	
				</form>
			</div>
			<div id="search_result">
				<ul id="search_list">
				</ul>
			</div>
        </div>
	</section>
	<footer>
    	<?php include "../footer.php";?>
    </footer>
</body>
</html>

