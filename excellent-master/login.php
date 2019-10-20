
<?php
session_start();
// echo password_hash('112',PASSWORD_BCRYPT);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect('localhost','root','','login');
if(!$conn){
	die('Không thể kết nối với Database');
	};
if (isset($_POST['user_email'])){
	$email = mysqli_real_escape_string($conn,$_POST['user_email']);
	
}
if (isset($_POST['user_password'])){
	$password = mysqli_real_escape_string($conn,$_POST['user_password']);
}
if(isset($_POST['login'])){
	$sql="SELECT * from users where email='$email'";
	
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row['password'])){
			$_SESSION['user']=$email;
			header('location:index.php');// kiem tra dung thi cho vao trang admin
		}
		else{
			echo 'mat khau sai';
			//  header('location:login.php');
		}


}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-Admin</title>
    <link rel="stylesheet" href="css/login.css">
    
   
	
</head>
<body style="background-image: url(image/1.jpg);">

	<h1 style="margin-top: 4% "> NGUYỄN TẤT THÀNH UNVERSITY</h1>
   
	<form  action=" " method ="post" >
	
		<div class="pom-agile">
				<h2>Login Quick</h2> <br>
				<input placeholder="E-mail"  name="user_email" class="user" type="user_email" required="">
				
			</div>
			<div class="pom-agile">
				<input  placeholder="Password" name="user_password" class="pass"  required="">
				
			</div>
			<div class="md3">
				<h6><a href="#">Forgot Password?</a></h6>
				<div class="right-w3l">
					<input type="submit" name="login" id="login" value="Login">
				</div> <br>
				<div class="register"><b> News User ?<a href="dangkiuser.php"> Register</a></b></div>
			</div>
		
	</form>






</body>
</html>
?>