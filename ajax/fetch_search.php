<?php 
	$connect = mysqli_connect("localhost","root","","bse482lab");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM shoppingmall WHERE loc_id = '".$_POST['txt']."'";
		
	}else{
		$sql = "SELECT * FROM shoppingmall";

	} 
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		
		while ($row = mysqli_fetch_array($result)) {
			$output .='<div class="col">
				<img src="sikkim.jpg" style="width: 100%;height: 150px;">
				<h2 style="padding: 10px;text-align: center;background-color: #ccc;margin: 0;">'.$row['shop_name'].'</h2>
				<div style="display:block;height: 32px;">
					<p style="float: left;margin-left: 10px;font-size: 22px;">Address: <span style="color:green;">'.$row['address'].'</span></p>
				</div>
				<br>
				<br>
				<div style="">
					<button class="addToWishlist btn" style="float:right;">Details</button>
				</div>
			</div>';
		}
		;
echo $output;
	}else{
		echo '<h1 class="text-danger p-5">No search found</h1>';
	}
		
 
?>

