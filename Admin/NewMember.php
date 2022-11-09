<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../AdminCSS/Newmemeber.css">
    <title>Document</title>
</head>
<body>
    <?php
    include 'Dashboard.php';
    ?>
        <div class="main-heading">
           <h1>
               New Memeber
           </h1>
        </div>
        <hr>
    <section class="new">
    <div class="tables">
    <table class="table" id="myTable" >
      <thead>
        <tr>
          <th scope="col-span-1">Sno</th>
          <th scope="col">BookingId</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Price</th>
          <th scope="col"> Booking Date</th>
          <th scope="col">Package Name</th>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
    include "../partials/connection.php";

    $sql="SELECT t1.Id as bookingid,t3.Fname as Name, t3.Email as email,t1.booking_date as bookingdate,t2.Title_name as title,t2.package_duration as PackageDuration, t2.Price as Price,t2.Description as Description,t4.Name as category_name,t5.package as PackageName FROM booking as t1 
    join addpost as t2 on t1.package_id =t2.Id 
    join register_details as t3 on t1.user_id=t3.Sno 
    join categorys as t4 on t2.category=t4.Id 
    join newpackage as t5 on t2.Package=t5.Id where t1.Payement_Type is null || t1.Payement_Type=''";



        $Sno=0;
        $result=mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($result)){
        $Sno=$Sno+1;
        echo "<tr>
                <th scope='row'> ".$Sno. "</th>
                <td >".$row['bookingid']."</td>
                <td >".$row['Name']."</td>
                <td >".$row['email']."</td>
                <td >".$row['Price']."</td>
                <td >".$row['bookingdate']."</td> 
                <td >".$row['PackageName']."</td> 
                <td >".$row['title']. "</td>
                <td> <form action='newbooking.php' >
                <input type=hidden name='ids' value=".$row['bookingid']." >
                <button class='Delete_button'>View</button>
                </form>
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
        { 'BookingId': true }, 
        { 'Name': true }, 
        { 'Email': true }, 
        { 'Price': true }, 
        { 'Booking Date': true }, 
        { 'Package Name': true } ,
        { 'Title': true } ,
        { 'Action': true } 
        ]
       
    });
            });
    </script>
</body>
</html>