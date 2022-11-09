<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "../partials/connection.php";
    $Package=$_POST['Package'];

    $exitsql="select * from categorys WHERE Name ='$Package'"; 

    $result1=mysqli_query($connection,$exitsql);
    $num=mysqli_num_rows($result1);
    if($num<=0){
        if($Package==""){
            // echo '<script type="text/JavaScript">
            // alert("Package Cannot be empty");
            // </script>';
            } 

        else{    
            $sql_Insert= "INSERT INTO `categorys` ( `Name`) VALUES ( '$Package')";
            $result2=mysqli_query($connection,$sql_Insert);

            if($result2){
                echo '<script type="text/JavaScript">
                        alert("Category Added Sucessfully");
                        </script>';
                }
         }
    }    
    else{
        echo '<script type="text/JavaScript">
            alert("Package already exit");
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
    <title>Document</title>
</head>
<body>
    <?php
    include 'Dashboard.php';
    ?>
    <div class="main-heading">
        <h1>
            Category
        </h1>
        <hr class="line_tag">
    </div>

    <section class='Category-section'>
        <div class="category">
            <form action="../Admin/AddCateogory.php" method="post">
                <h3>Add category</h3>
                <input type="text" name='Package' placeholder="Enter the category" class="Icategory">
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
          <th scope="col">FName</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
    include "../partials/connection.php";
        $sql="SELECT * FROM `Categorys`";
        $Sno=0;
        $result=mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($result)){
        $Sno=$Sno+1;
        echo "<tr>
                <th scope='row'> ".$Sno. "</th>
                <td >".$row['Name'].  "</td>
                <td><form action='../Admin/AddCateogory.php' Method='POST'>
                <input type=hidden name='id' value=".$row['Id'].">
                    <button class='Delete-button' name='deletedata' id=".$row['Id'].">Delete</button>
                </form> </td>
                </tr>";
        }


        ?>

    </Section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
    <script >
        $(document).ready(function () {
            $('#myTable').DataTable({
                columns:[
        { 'Sno': true }, //col 1
        { 'Name': true }, //col 2
        { 'Action': true } //col 5
        ]
        // pageLength: 5
        // lengthMenu: [
        //     [5, 10, 15, -1],
        //     [5, 10, 15, 'All'],
        // ],
        // pageLength: 5
        // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "Todos"]];
    });
            });
            
        </script>
</body>
</html>