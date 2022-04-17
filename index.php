<?php
	include('layout/header.php');
	include('db_connect.php');
?>

<!-- search -->
<section class="container-fluid">
	<div class="container search">
		<div>
			<h2>Search your product which you want Here</h2>
			<select id="search_text">
				<option value="">Select Option</option>
				<option value="2">Bashundhara</option>
				<option value="1">Mirpur</option>
			</select>
		</div>
	</div>
</section>

<section class="container-fluid">
	<div class="contentbox">
		<div class="box">
			<div >
				<h2 align="center" style="color: green">Popular <br>Shopping Mall</h2>
				<ul>
					<?php
					    $sql = "SELECT * FROM `shoppingmall` limit 3";
					    $result = mysqli_query($connect, $sql);

					    if ($result) {
					      while ($data = mysqli_fetch_array($result)) {
    				?>
						<li style="">
							<a href="details.php?id=<?php echo $data['id']; ?>&name=<?php echo $data['shop_name'];?>" style="text-decoration:none; padding: 20px;"><?php echo $data['shop_name']; ?></a>
						</li>
					<?php }} ?>
				</ul>
			</div>	
		</div>
		<div class="box1" id="res">
<?php
  $sql = "SELECT * FROM `shoppingmall`";
  $result = mysqli_query($connect, $sql);
 ?>
 <?php 

    if ($result) {
      while ($data = mysqli_fetch_array($result)) {
    ?>
			<div class="col">
				<img src="<?php echo $data['mall_img']; ?>" style="width: 100%;height: 150px;">
				<h2 style="padding: 10px;text-align: center;background-color: #ccc;margin: 0;"><?php echo $data['shop_name']; ?></h2>
				<div style="display:block;height: 32px;">
					<p style="float: left;margin-left: 10px;font-size: 22px;">Address: <span style="color:green;"><?php echo $data['address']; ?></span></p>
				</div>
				<br>
				<br>
				<div style="">
					<a href="details.php?id=<?php echo $data['id']; ?>&name=<?php echo $data['shop_name'];?>" class="addToWishlist btn" style="float:right;">Details</a>
				</div>
			</div>
	<?php }} ?>
		</div>
	</div>
</section>
<section class="container-fluid" style="margin-top:5px;background-color: #ccc;">
	<div class="container">
			<p style="padding: 15px;" align="center">Copyright @2022</p>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	
    function load_data(txt)
    {
      $.ajax({
       url:"ajax/fetch_search.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#res').html(data);
       }
      });
     }
  
	    $('#search_text').change(function(){
	      
	      var txt = $(this).val();
	      if (txt != '') {
	        load_data(txt);
	      }else{
	        load_data();
	      }
	    });

		var i = $('#cartmenu').text();
		$(".addToCart").on('click',function(){
			i++;
			$('#cartmenu').text(i);
		});

		var j = $('#wishmenu').text();
		$(".addToWishlist").on('click',function(){
			j++;
			$('#wishmenu').text(j);
		});

	})
</script>
</body>
</html>