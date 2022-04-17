<?php
	include('layout/header.php');
	
?>

<!-- search -->
<section class="container-fluid">
	<div class="container search">
		<div style="left: 37%;">
			<h2><?php echo $_GET['name']; ?></h2>
		</div>
	</div>
</section>

<section class="container-fluid">
	<div class="contentbox">
		<div class="box">
			<div >
				<h2 align="center" style="color: green">Popular <br>Shopping Mall</h2>
				<ul>
					<li style="">
						<a href="" style="text-decoration:none; padding: 20px;">Shirt</a>
					</li>
					<li style="">
						<a href="" style="text-decoration:none; padding: 20px;">Pant</a>
					</li>
				</ul>
			</div>	
		</div>
		<div class="box1" id="res">
<?php
  $sql = "SELECT * FROM `shppingmall_details`
JOIN items on items.item_id = shppingmall_details.item_id
where shppingmall_details.shpping_id=1";
  $result = mysqli_query($connect, $sql);
 ?>
 <?php 

    if ($result) {
      while ($data = mysqli_fetch_array($result)) {
    ?>
			<div class="col">
				<img src="<?php echo $data['image']; ?>" style="width: 100%;height: 150px;">
				<h2 style="padding: 10px;text-align: center;background-color: #ccc;margin: 0;"><?php echo $data['item_name']; ?></h2>
				<div style="display:block;height: 32px;">
					<p style="float: left;margin-left: 10px;font-size: 22px;">Price: <span style="color:green;"><?php echo $data['price']; ?></span></p>
					<p style="float: right;margin-right: 10px;font-size: 22px;">Rating: <span style="color:red;">4.5</span></p>
				</div>
				<br>
				<br>
				<div style="">
					<button class="addToCart btn" id="<?php echo $data['details_id']; ?>"
						data-price="<?php echo $data['item_id']; ?>" style="">Add to cart</button>
					<a href="checkout.php?price=<?php echo $data['price']; ?>" class="btn" style="float:right;margin-right: 14px;background: crimson;color: #fff;text-decoration: none;">Buy Now</a>
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

		
		$(document).on('click','.addToCart',function(){
      var getid = $(this).attr('id');
      var carttext = parseInt($('#cartmenu').text());
      var totalAmount = parseInt($('#totalAmount').text());
      var item = parseInt($(this).data("price"));
      $.ajax({
       url:"ajax/add_to_cart.php",
       method:"POST",
       data:{getid:getid,item:item},
       success:function(data)
       {
       	
         if(data == 1){
         	alert("product already exists in CART")
          }else{
          	alert("product added successfully in CART")
          	$('#cartmenu').text(carttext+1);
         }
       }
      });
      
    });


	})
</script>
</body>
</html>