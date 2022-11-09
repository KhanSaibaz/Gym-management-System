<?php
session_start();
if(!isset($_SESSION['Booking']) && $_SESSION['Booking']!=true){
header('location:add.php');
    exit;
}

else{
 include "partials/connection.php";
$uid=$_SESSION['uid'];
echo $uid;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/booking.css">

    <title>Document</title>
</head>
<body>
    <?php
include 'home.php';
?>
<section class="det">
    <div class="tables" >
        <table id="myTable">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Booking date</th>
                    <th>Package Duration</th>
                    <th scope="col">Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>package Name</th>
                    <th>Action</th>
                </tr>
            </thead>
        <?php
    include "partials/connection.php";

    $sql="SELECT t1.Id as bookingid,t3.Fname as Name, t3.Email as email,t1.Booking_date as bookingdate,t2.Title_name as title,t2.package_duration as PackageDuration,
    t2.price as Price,t2.Description as description,t4.Name as category_name,t5.package as Package FROM booking as t1
     join addpost as t2
    on t1.package_id =t2.Id
    join register_details as t3
    on t1.Id=t3.Sno
    join categorys as t4
    on t2.category=t4.Id
    join newpackage as t5
    on t2.Package=t5.Id
    where t1.Id='$uid'";
    $result=mysqli_query($connection,$sql);
    $Sno=1;
    $row=mysqli_fetch_assoc($result);

    ?>
        <tbody>
            <tr>
                <td scope='row'> <?php echo $Sno; ?> </td>
                <td > <?php echo $row['bookingdate']; ?> </th>
                <td > <?php echo$row['PackageDuration']; ?> </th>
                <td > <?php echo$row['Price']; ?> </th>
                <td > <?php echo$row['description']; ?> </th>
                <td > <?php echo$row['Name']; ?> </th>
                <td > <?php echo $row['Package']; ?> </th>
                <td>
                <form action='booking_view.php'>
                <input type=hidden name='id' value="<?php echo $uid?>"  >
                    <button class='Delete-button'  >View</button>
                </form>
                </td>
              </tr>
    </tbody>
       <!-- -->
       </table>
    </div>
</section>

</body>
</html>

<?php
}
?>