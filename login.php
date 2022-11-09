<?php

$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "partials/connection.php";
    $Email=$_POST['email'];
    $Password=$_POST['Password'];

// $SQL="select * from users02 where username='$username' AND '$Password'";
$SQL="select * from register_details where Email='$Email' ";
$result=mysqli_query($connection,$SQL);
$num=mysqli_num_rows($result);
    if($num >=1 ){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($Password,$row['Password'])){
                session_start();
                $_SESSION['loggedin']=true; 
				$_SESSION['uid']= $row['Sno'];

                header('location:add.php');
            }
            else {
				echo '<script type="text/JavaScript">
				alert("Invalid Id Password");
				</script>';
            }
        }
    }
    else {
		echo '<script type="text/JavaScript">
            alert("Invalid Id Password");
            </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
	<title>Login</title>
</head>

<body>
	<?php
		include 'partials/nav.php';
	?>
	<section class="login_sect">
		<div class="login_content">
			<h1>Login</h1>
		</div>
	</section>
	<div class="loginbox">
		<img src="Img/login.png" alt="" class="IMGS">
		<h2>Login Here</h2>
		<form action="../PHP_GYM/login.php" method="POST">
			<input type="email" name="email" id="" placeholder="Email" autocomplete="off">
			<input type="password" name="Password" id="" placeholder="Password" autocomplete="off">
			<button class="loginButton">Login</button>
			<button class="RegisterButton">
				<a class="Regclick" href="../PHP_gym/register.php">Register</a>
			</button>
		</form>
	</div>
	
</body>

</html>