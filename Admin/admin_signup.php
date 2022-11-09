<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $Admin_Email=$_POST['Admin_Email'];
    $Admin_Password=$_POST['Admin_Password'];
    if($Admin_Email==='squatup@123' && $Admin_Password==="gym@123"){
        session_start();
        $_SESSION['Adminsingup']=true;
        header('location:cont.php');
    }
    else{
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
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/11172342c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../AdminCSS/admin_login.css">
</head>
<body>
    <div class="upper">
        <h1>SQUAT UP  /  ADMIN LOGIN</h1>
    </div>
    <div class="color">
        
        </div>
        <div class="loginbox">
            <img src="../Img/login.png" alt="" class="IMGS">
            <h2>SIGN UP</h2>
            <hr>
            <form action="../Admin/admin_signup.php" method="POST">
                <label for="">Email</label>
                <input type="email" name="Admin_Email" id="" placeholder="Email" autocomplete="off">
                <label for="">Password</label>
                <input type="password" name="Admin_Password" id="" placeholder="Password" autocomplete="off">
                <button class="loginButton">SIGN IN</button>
                <hr>
                <a href="../home.php"><i class="fa-solid fa-backward"></i> Back to Home page</a>
            </form>
       
</body>
</html>