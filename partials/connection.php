<?php
$servername="localhost";
$username="root";
$password="";
$database="GYMS";

$connection=mysqli_connect($servername,$username,$password,$database);
if(!$connection){
    die("Error Occured Due to".mysqli_error($connection));
}

?>