<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "../partials/connection.php";
    $Package_name=$_POST['Package'];
    $Cate=$_POST['category'];

    $excute_sql="select * from newpackage WHERE package ='$Package_name'"; 
    $result=mysqli_query($connection,$excute_sql);
    $num=mysqli_num_rows($result);
    if($num<=0){
        if($Package_name=="" || $Cate==""){
            // echo '<script type="text/JavaScript">
            // alert("Package Cannot be empty");
            // </script>';
          } 
          
          else{    
            $sql_Insert= "INSERT INTO `newpackage` ( package,category_id) VALUES ( '$Package_name','$Cate')";
            $result2=mysqli_query($connection,$sql_Insert);

            if($result2){
                echo '<script type="text/JavaScript">
                        alert("Package Added Sucessfully");
                        </script>';
                }
         }
    }    
    else{
        echo '<script type="text/JavaScript">
            alert("Package already exist");
            </script>';
    }
}
if(isset($_POST['deletedata'])){
  include "../partials/connection.php";
$id=$_POST['id'];

$sql="DELETE FROM `categorys` WHERE `Id` = $id";
$result=mysqli_query($connection,$sql);
echo "<script>alert('Record Delete successfully');</script>";
echo "<script>window.location.href='AddCateogory.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../AdminCSS/AddCategory.css">
    <link rel="stylesheet" href="../AdminCSS/Addpackage.css">
    <title>Document</title>
  </head>
  <body>
    <?php
    include 'Dashboard.php';
    ?>
    <div class="main-heading">
        <h1>
            Add Package
        </h1>
        <hr class="line_tag">
    </div>

    <section class='Category-section'>
      <div class="category">
        <form action="../Admin/Addpackage.php" method="post">
          <h3>Add Package</h3>
    
            <?php
            include "../partials/connection.php";
            $sql="SELECT * FROM `Categorys`";
            $category_execute=mysqli_query($connection,$sql);
            echo '<select name="category" id="category" class="DropDown">;   
                 <option value="saab">--select--</option>';
            while($row=mysqli_fetch_assoc($category_execute)){
              echo "<option value='".$row['Id']."'>".$row['Name']."</option>";
            }
            ?>

                <input type="text" name='Package'  autocomplete="off"placeholder="Enter the package" class="Icategory">
                 <button class="category-submit">Submit</button>
            </form>
        </div>
    </section>

    <Section class="show">
    <div class="">
    <table class="table" id="myTable" >
      <thead>
        <tr>
          <th scope="col-span-1">Sno</th>
          <th scope="col">Category</th>
          <th scope="col">Package</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
    include "../partials/connection.php";

    $sql="SELECT * FROM `newPackage` join Categorys on newpackage.Category_id=categorys.Id";
        $Sno=0;
        $result=mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($result)){
        $Sno=$Sno+1;
        echo "<tr>
                <th scope='row'> ".$Sno. "</th>
                <td >".$row['Name'].  "</td>
                <td >".$row['package'].  "</td>
                <td>
                <form action='../Admin/delete.php' Method='POST'>
                <input type=hidden name='id' value=".$row['Id'].">
                    <button class='Delete-button' name='deletedata' id=".$row['Id'].">Delete</button>
                </form>
                </td>
              </tr>";
        }

?>

    </Section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" ></script>
    

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
    <script >
        $(document).ready(function () {
            $('#myTable').DataTable({
                columns:[
        { 'Sno': true }, 
        { 'Name': true }, 
        { 'Package': true }, 
        { 'Action': true } 
        ]
        
    });
            });
            
        </script>
</body>
</html>