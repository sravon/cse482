<?php include 'db_connect.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['name'])  &&  isset($_POST['password'])  ) {
      $query = "insert into users(name,email,password) values('{$_POST['name']}' ,'{$_POST['email']}', '{$_POST['password']}') ";
      $result = mysqli_query($connect, $query);
    }
    if($result){
      echo "<h3 class='text-center'>You are registered successfully.</h3>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<style type="text/css">
		*{
			margin:0;padding: 0;
		}
		.parent_class{
			width:100%;
		}
		.sub_class{
			width:50%;margin: 0 auto;
		}
		.formdiv{
			margin-top:30px;padding:20px;background-color:#ccc;
		}
	</style>
</head>
<body>
<section class="parent_class">
	<div class="sub_class">
		<div class="formdiv">
			<h2 align="center" style="margin-bottom: 10px;color: #fff;background-color: green;padding: 15px;">Registration</h2>
			<div style="width: 70%;margin: 0 auto;font-size: 30px;">
				<form action="" method="post">
					<table cellspacing="6">
						<tr>
							<td><label for="Name">Name :</label></td>
							<td><input type="text" name="name" id="name" placeholder="Enter Your Name" style="width: 260px;height: 40px;font-size: 17px;padding: 5px;"></td>
						</tr>
						<tr>
							<td><label for="Username">Email :</label></td>
							<td><input type="email" name="email" id="email" placeholder="Enter Your email" style="width: 260px;height: 40px;font-size: 17px;padding: 5px;"></td>
						</tr>

						<tr>
							<td><label for="password">Password:</label></td>
							<td><input type="password" name="password" id="password" placeholder="Enter Your Password" style="width: 260px;height: 40px;font-size: 17px;padding: 5px;"></td>
							<td><button id="showhide" type="button" style="padding:10px;background-color:darkgreen;cursor: pointer;">Show</button></td>
						</tr>
						
						<tr>
							<td><label for="contact">Contact No:</label></td>
							<td><input type="text" name="contact" id="contact" placeholder="Enter Your Contact" style="width: 260px;height: 40px;font-size: 17px;padding: 5px;"></td>
						</tr>
						<tr>
							<td></td>
							<td><input style="padding: 15px;font-size: 19px;cursor: pointer;background-color: yellowgreen;border-radius: 20px;color: #fff;" type="submit" name="submit" value="submit"></td>
						</tr>
					</table>
				</form>
			</div>

		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
			var check = false;
		$('#showhide').click( function(){
			if(check){
				$("#password").attr('type', 'password');
				$(this).text('show');
				check = false
			}else{
				$("#password").attr('type', 'text');
				$(this).text('hide');
				check = true
			}
			
		})
	})
</script>
</body>
</html>