<?php
session_start();
if (isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
}else{
	$login = false;
}

$connect = mysqli_connect("localhost","root","","bse482lab");
if($login){
	if (isset($_POST['getid'])) {
		$sql = "SELECT * FROM `cart` WHERE details_id='".$_POST['getid']."' and user_id='".$_SESSION['user_id']."'";
		$result = mysqli_query($connect, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo 1;
		}else{
			$sql = "INSERT INTO `cart`(`details_id`, `item_id`, `user_id`) VALUES ('{$_POST['getid']}','{$_POST['item']}','{$_SESSION['user_id']}')";
			$result = mysqli_query($connect, $sql);
			if ($result) {
				echo 111;
			}
		}
	}
}




 
?>


