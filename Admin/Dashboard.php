<?php
    session_start();
    if(!$_SESSION['Adminsingup'] && $_SESSION['Adminsingup']!=true){
        header('location:admin_signup.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/86e910e7c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../AdminCSS/dashboard.css">
    <title>Dashboard</title>
</head>

<body>

    <nav class="sidebar close">
        <header>
            <div class="img-text">
                <span class="image">
                    <img src="../img/squatup.jpeg" alt="">
                </span>

                <div class="text header-text">
                    <span class="name">SQUAT UP</span>
                </div>
            </div>
            <i class="fa-solid fa-arrow-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">

                <li class="nav-link">
                        <a href="cont.php">
                            <i class="fa-solid fa-house symbol"></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                <li class="nav-link">
                        <a href="Active member.php">
                            <i class="fa-solid fa-user symbol"></i>
                            <span class="text nav-text">Active Member</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="NewMember.php">
                            <i class="fa-solid fa-user-plus symbol"></i>
                            <span class="text nav-text">New Member</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="AddCateogory.php">
                            <i class="fa-solid fa-box symbol"></i>
                            <span class="text nav-text">Add Category</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Addpackage.php">
                            <i class="fa-regular fa-box-archive symbol"></i> 
                            <span class="text nav-text">Add Package</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="AddPost.php">
                            <!-- <i class="fa-solid fa-house symbol"></i> -->
                            <i class="fa-sharp fa-solid fa-cube symbol"></i>
                            <span class="text nav-text">Package</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="payement.php">
                            <i class="fa-solid fa-money-bill symbol"></i>
                            <span class="text nav-text">Payement</span>
                        </a>
                    </li>

                   

    
            </ul>
        </div>

        <div class="botton-content">

            <li class="">
                <a href="../Admin/Admin_logout.php">
                    <i class="fa-solid fa-right-from-bracket symbol"></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="mode-sun">
                    <i class="fa-solid fa-moon  symbol moon"></i>
                    <i class="fa-solid fa-sun  symbol sun"></i>
                </div>
                <span class="text mode-text">Dark Mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>

            </li>

        </div>

        </div>
    </nav>


    <script src="../AdminJS/dashboard.js"></script>
    <section class="head-content">
        <i class="fa-solid fa-gauge symbol"></i>
        <div class="text">Dashboard </div>
    </section>
    <script>
        function myfun() {
            docuement.getEleme
        }
    </script>


</body>

</html>