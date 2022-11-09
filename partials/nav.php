<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  $loggedin=true;
}
else{
  $loggedin=false;
}


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
    <script src="https://kit.fontawesome.com/11172342c5.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="js/nav.js">
        
    </head>
    <body>    
    <div class="login" align="right">';
    
    if(!$loggedin){
        echo '<i class="fa-regular fa-user"></i>
         <a href="../php_gym/login.php" >Login</a>';
    }
    if($loggedin){
        echo '<i class="fa-regular fa-user"></i>
            <a href="../php_gym/logout.php" >Logout</a>';
        echo '<i class="fa-solid fa-book"></i>
            <a href="../php_gym/booking_view.php" >Booking <a>';
    }
            
    echo   '</div>

        <h1 class="mainhead">SQUAT UP</h1>
        <nav class="navbar">

            <span id="toggle-nav" onclick="toggleNav()">
                <i class="fa fa-bars"></i>
            </span>

            <ul id="navlist">
                <li> <a href="../php_gym/home.php"> Home</a> </li>
                <li> <a href="../php_gym/about.php"> About</a> </li>
                <li> <a href="../php_gym/contact.php"> Contact</a> </li>';
                if($loggedin){
                echo  '<li> <a href="../php_gym/add.php"> Booking Package</a> </li>';
               
                }
                if(!$loggedin){
               echo '<li> <a href="Admin/admin_signup.php"> Admin </a> </li>';
                }
              echo   
            '</ul>

    </nav>
  
</body>

<script>
    
    var nav = document.getElementById("navlist");
    

function toggleNav () {       

    if ( nav.style.display === "" )      //if navlist is empty we can block the list item 
    nav.style.display = "block";


}


function windowResizeHandler () {
    if ( screen.width > 500 )
    nav.style.display = "";
}

window.addEventListener("resize", windowResizeHandler);

</script>

</html>';

?>
