<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wIdth=device-wIdth, initial-scale=1.0">
    <link rel="stylesheet" href="../AdminCSS/manage.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/11172342c5.js" crossorigin="anonymous"></script>


    <title>Document</title>
</head>
<body>
    <?php
        include "../partials/connection.php";

    include  'Dashboard.php';
?>
    <section class="manage">
        <div class="head">
            <h2> Partials Payment</h2>
            <a href="../Admin/payement.php" ><i class="fa-solid fa-backward"></i> Back to Payement page</a>
            <hr>
        </div>
    <div class="tables">
    <table class="table" id="myTable" >
      <thead>
 <thead>
   <tr>
     <th scope="col-span-1">Sno</th>
     <th scope="col">Name</th>
     <th scope="col">Email </th>
     <th scope="col">bookingdate</th>
     <th scope="col"> PackageDuration</th>
     <th scope="col">PackageName</th>
     <th scope="col">Action</th>
   </tr>
 </thead>
 <tbody>
   <?php
   include "../partials/connection.php";
    $sql=" SELECT t1.Id as BookingId,t3.Fname as Name, t3.Email as email,t1.Booking_Date as bookingdate,t2.Title_name as title,t2.package_duration as PackageDuratiobn, t2.price as Price,t2.description as Description,t4.Name as category_name,t5.package as PackageName FROM booking as t1 
    join addpost as t2 on t1.package_id =t2.Id 
    join register_details as t3 on t1.user_id=t3.Sno 
    join categorys as t4 on t2.Category=t4.Id 
    join newpackage as t5 on t2.Package=t5.Id where t1.Payement_Type='Partial Payment';";
   $res=mysqli_query($connection,$sql);

   $Sno=0;
   $result=mysqli_query($connection,$sql);
   while($row=mysqli_fetch_assoc($result)){
   $Sno=$Sno+1;
   echo "<tr>
           <th scope='row'> ".$Sno. "</th>
           <td >".$row['Name']."</td>
           <td >".$row['email']."</td>
           <td >".$row['bookingdate']."</td> 
           <td >".$row['PackageDuratiobn']. "</td>
           <td >".$row['PackageName']. "</td>
           <td> <form action='../Admin/EditPost.php' >
           <input type=hidden name='id' value=".$row['BookingId'].">
           <a href='booking_view.php' >
           <button class='Delete-button'  id=".$row['BookingId'].">View</button>
      </a>           </form>
           </td>
           </tr>";
   }
   ?>
   </div>
   </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" ></script>
    
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
    <script >
        $(document).ready(function () {
            $('#myTable').DataTable({
                columns:[
        { 'Sno': true }, 
        { 'Name': true }, 
        { 'email  ': true }, 
        { 'package': true }, 
        { 'bookingdate ': true }, 
        { 'PackageName': true } ,
        { 'Action': true } 
        ]
       
    });
            });
    </script>
</body>
</html>



