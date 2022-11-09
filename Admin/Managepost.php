
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AdminCSS/manage.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <title>Document</title>
</head>
<body>
    <?php
    include 'Dashboard.php';
    ?>

    <section class="manage">
        <div class="head">
            <h2> Manage Post</h2>
            <hr>
        </div>
    <div class="tables">
    <table class="table" id="myTable" >
      <thead>
        <tr>
          <th scope="col-span-1">Sno</th>
          <th scope="col">Category</th>
          <th scope="col">Package Type</th>
          <th scope="col">Tilte</th>
          <th scope="col">Package Duartion</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
    include "../partials/connection.php";
$sql="SELECT t1.Id as packageId,t2.*,t3.*,t1.* FROM addPost as t1 join Categorys as t2 on t1.Category=t2.Id join newpackage as t3 on t1.Package=t3.Id";

        $Sno=0;
        $result=mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($result)){
        $Sno=$Sno+1;
        echo "<tr>
                <th scope='row'> ".$Sno. "</th>
                <td >".$row['Name']."</td>
                <td >".$row['package']."</td>
                <td >".$row['Title_name']."</td>
                <td >".$row['package_duration']."</td> 
                <td >".$row['price']. "</td>
                <td> <form action='../Admin/EditPost.php' >
                <input type=hidden name='id' value=".$row['Id'].">
                <button class='Delete-button'  id=".$row['Id'].">Edit</button>
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
        { 'Category': true }, 
        { 'Package  Type': true }, 
        { 'Title': true }, 
        { 'Package Duartion': true }, 
        { 'Price': true } ,
        { 'Action': true } 
        ]
       
    });
            });
    </script>
</body>
</html>