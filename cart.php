<?php
  include('layout/header.php');
  
?>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

 /*table style*/
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
  margin: 0 auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
<section style="width:100%;">
  <div style="width:100%;margin: 0 auto;height: 170px;background: cadetblue;position: relative;">
    <div style="width: 100%;position:absolute;top: 20%;text-align: center;">
      <h2>Cart Page</h2>
    </div>
  </div>
</section>
<section style="width:100%;">
	<div style="width:80%;display:flex;margin: 0 auto;">
		<div style="width:80%;height: 100vh;background-color :#ccc;">
      <div style="margin-top:20px">
        <table >
          <tr>
            <th>Item</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
           <?php 
        $sql ="SELECT * FROM `cart` 
JOIN shppingmall_details ON shppingmall_details.details_id = cart.details_id
JOIN items ON shppingmall_details.item_id = items.item_id
WHERE user_id='{$_SESSION['user_id']}'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
          $sum = 0;
          while ($data = mysqli_fetch_array($result)) {
            $sum += $data['price'];
       ?>
          <tr>
            <td><img src="<?php echo $data['image']; ?>" width="100"></td>
            <td><?php echo $data['item_name']; ?></td>
            <td><?php echo $data['price']; ?> tk</td>
            <td>
              <div>
                <span><a style="text-decoration: none;background: green;padding: 6px;font-size: 24px;">+</a></span>
                <input type="text" name="" value="<?php echo $data['quantity']; ?>" readonly="" style="width: 34px;height: 30px;font-size: 20px;">
                <span><a style="text-decoration: none;background: red;padding: 6px;font-size: 24px;">-</a></span>
              </div></td>
            <td><?php echo $data['price'] * $data['quantity']; ?>Tk</td>
          </tr>
        <?php }} ?>
        </table>
      </div>
		</div>
		<div style="width:20%;height: 300px;">
				<div style="width:100%;margin:0 auto;border-bottom: 2px solid #ddd;">
          <h2 align="center" style="color: green">Cash Memo</h2>
          <ul style="list-style-type: none;width:100%;">
            <li style="padding:5px;border:2px solid #ccc">Cart Sub Total <span style="float:right">Tk <?php echo $sum; ?></span></li>
            <li style="padding:5px;border:2px solid #ccc">Tax <span style="float:right">10%</span></li>
            <li style="padding:5px;border:2px solid #ccc">Shipping Cost <span style="float:right">Free</span></li>
            <li style="padding:5px;border:2px solid #ccc">Total <span style="float:right"><?php echo $sum*0.1+$sum; ?>Tk</span></li>
          </ul>
        </div>
        <a href="checkout.php?price=<?php echo $sum*0.1+$sum; ?>" style="float: right; background: cadetblue;padding: 10px;text-decoration: none;color: white;">Checkout</a>
		</div>
	</div>
		
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>