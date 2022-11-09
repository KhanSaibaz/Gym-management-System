<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include "Dashboard.php";
include "../partials/connection.php";

$sql1="select * from categorys";
$res1=mysqli_query($connection,$sql1);
$num1=mysqli_num_rows($res1);

$sql2="select * from newpackage";
$res2=mysqli_query($connection,$sql2);
$num2=mysqli_num_rows($res2);

$sql1="select * from categorys";
$res1=mysqli_query($connection,$sql1);
$num1=mysqli_num_rows($res1);

$sql1="select * from categorys";
$res1=mysqli_query($connection,$sql1);
$num1=mysqli_num_rows($res1);

$sql1="select * from categorys";
$res1=mysqli_query($connection,$sql1);
$num1=mysqli_num_rows($res1);

$sql1="select * from categorys";
$res1=mysqli_query($connection,$sql1);
$num1=mysqli_num_rows($res1);
?>


    <section class="home">
        <div class="container">
          <ul class="items">

            <li class="list-items">
                <div class="logos" style="background-color: #19e3edb3">
                    <i class="fa-solid fa-user "></i>
                </div>
                <div class="newtab">
                    <a href="NewMember.php" class="forward">
                        <h2>New Member </h2>
                    </a>     
                </div>
            </li>

            <li class="list-items">
                <div class="logos" style="background-color: #1d6610bd">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="newtab">
                    <a href="Active member.php" class="forward">
                    <h2>Active Member </h2>
                    </a>     
                </div>
            </li>

            <li class="list-items">
                <div class="logos" >
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="newtab">
                    <a href="AddCateogory.php" class="forward">
                    <h2>Add category</h2>

                    </a>     
                </div>
            </li>

            <li class="list-items">
                <div class="logos" style="background-color: #fbf41fe0">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="newtab">
                    <a href="Addpackage.php" class="forward">
                    <h2>Add Package </h2>
                    </a>     
                </div>
            </li>

            <li class="list-items">
                <div class="logos" style="background-color: #361066bd;">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="newtab">
                    <a href="AddPost.php" class="forward">
                        <h2>Add Post </h2>
                    </a>     
                </div>
            </li>
            <li class="list-items">
            <div class="logos" style="background-color: #dc237dbd;">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="newtab">
                    <a href="ManagePost.php" class="forward">
                        <h2>Manage Post </h2>
                    </a>     
                </div>
            </li>
            <li class="list-items">
                <div class="logos" style="background-color: #1d6610bd">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="newtab">
                    <a href="payement.php" class="forward">
                        <h2>Payement </h2>
                    </a>     
                </div>
            </li>

            <!-- <li class="list-items" >
            <div class="logos" style="background-color: #19e3edb3">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="newtab">
                    <a href="" class="forward">
                    <h2>Active Member </h2>
                    </a>     
                </div>
            </li> -->
        </div>
    </section>       
</body>
</html>