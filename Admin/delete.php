<?php
if(isset($_POST['deletedata'])){
    include "../partials/connection.php";
$id=$_POST['id'];

$sql="DELETE FROM `category` WHERE `Id` = $id";
$result=mysqli_query($connection,$sql);
echo "<script>alert('Record Delete successfully');</script>";
echo "<script>window.location.href='Addpackage.php'</script>";

}
?>
