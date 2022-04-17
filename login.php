<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="loginstyle.css">    
</head>  
<?php include 'db_connect.php'; ?>
<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: index.php');
}

$connect = mysqli_connect("localhost", "root" );

mysqli_select_db($connect, 'bse482lab');

if(isset($_POST['submit'])){
 
  $sql = "SELECT * FROM users WHERE email='{$_POST['email']}' AND password='{$_POST['password']}'";
  $result = mysqli_query($connect, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['login'] = true;
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $_POST['email'];
    setcookie('user', $_POST['email'], time() + (86400 * 30), "/"); // 86400 = 1 day
    header("Location: index.php");
  }else{
    echo '<h4 class="text-center p-3 text-danger">username and password is incorrect</h4>';
  }
  
} 

?>
  
<body>    
    <h2></h2><br>    
    <div class="login">    
    <form method="post" action="">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="email" name="email" placeholder="enter email" style="height: 40px;width: 200px;">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="password" placeholder="Password" style="height: 40px;width: 200px;">    
        <br><br>    
        <input type="submit" name="submit" id="log" value="Submit">       
        <br><br>    
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br>    
        
        <button type="button">Forgot Password</button>   
    </form>     
</div>    
</body>    
</html>     