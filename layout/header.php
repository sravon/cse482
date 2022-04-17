<?php
	session_start();
	include('db_connect.php');
?>
<?php 
	if(isset($_GET['logout'])){
		setcookie('user', $_POST['email'], time() - (86400 * 30), "/");
		session_destroy();
		header("Location:login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>This is Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="topnav" id="myTopnav">
  <div>
  	<a href="index.php" class="active">Home</a>
	  <a href="contact.php">Contact</a>
  </div>
  <li style="float:right;list-style: none;margin-right: 70px;">
  	
  	<?php 
  		if(isset($_SESSION['login'])){
  			$sql = "SELECT count(*) as count FROM `cart` WHERE user_id='{$_SESSION['user_id']}'";
  			$result = mysqli_query($connect, $sql);
  			$data = mysqli_fetch_array($result);
  			echo '<a href="cart.php" >Cart (<span id="cartmenu" style="color:red">'.$data['count'].'</span>)</a>';
  			echo '<a href="?logout">Logout</a>';
  		}else{
  			echo '<a href="login.php">Login</a>';
  		}

  	 ?>
  	
  </li>
</div>