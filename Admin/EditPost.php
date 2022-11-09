<?php
// if (strlen($_SESSION['id']==0)) {
//     header('location:Managepost.php.php');
// } 
// else{
$ID=$_GET['id'];

if(isset($_POST['submit'])){
    include '../partials/connection.php';
    $category=$_POST['Category'];
    $package=$_POST['Package'];
    $Title_name=$_POST['Title'];
    $package_duration=$_POST['packageDuration'];
    $price=$_POST['price'];
    $description=$_POST['descriptions'];

    $sql1="update addpost set Category ='$category', Package='$package' , Title_name='$Title_name', package_duration='$package_duration',price='$price',description='$description' WHERE Id='$ID'";
    $res=mysqli_query($connection,$sql1);

    if($res){
        echo '<script type="text/JavaScript">
        alert("Record Update Sucessfully");
        </script>';
        echo "<script>window.location.href='Managepost.php'</script>";
    }
    else{
        echo '<script type="text/JavaScript">
        alert("Error");
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AdminCSS/AddPost.css">
    <title>Document</title>
</head>

<body>
    <?php
    include 'Dashboard.php';
    ?>
    <section class="form">
        <div class="content">
            <h1 style='color:red; text-align:center;' >Update Booking Package</h1>
            <hr>
            <?php
                include "../partials/connection.php";

                $sql="SELECT t1.Id as packageId,t2.*,t3.*,t1.* FROM addPost as t1 join Categorys as t2 on t1.Category=t2.Id join newpackage as t3 on t1.Package=t3.Id  where t1.Id='$ID'";
                // $sql="SELECT * FROM addpost as t1
                //     join categorys as t2
                //     on t1.category=t2.id
                //     join newpackage as t3
                //     on t1.Package=t3.id where t1.id='$ID'";


                $result=mysqli_query($connection,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
            <form action="" method="POST">
                <div class="maindet">

                    <div class="details1">
                        <span for="from-group" class="label_grp">Cateogory</span>
                        <select name="Category" id="categorys" class="DropDown" >
                  <option value="<?php echo $row['Id'];?>"><?php echo $row['Name'];?></option>

                            <option value="">--select--</option>
                            <?php
                                include "../partials/connection.php";
                                $sql="SELECT * FROM `categorys`";
                                $categorys_execute=mysqli_query($connection,$sql);
                                while($row1=mysqli_fetch_assoc($categorys_execute)){
                                echo "<option value='".$row1['Id']."'>".$row1['Name']."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="details1">
                        <span class="label_grp">Package</span>
                        <select name="Package"  id="packageId" class="DropDown">  
                            <option value="<?php echo $row['Id'] ;?>"><?php echo $row['package'];?></option>
                            <option value="<?php echo $row["Id"]; ?>"><?php echo $row["package"]; ?></option>

                        </select>
                    </div>

                    <div class="details1">
                        <span class="label_grp">Title Name</span>
                        <input type="text" name='Title' value="<?php echo $row['Title_name'];?>" placeholder='Enter the Title name '>
                    </div>

                    <div class="details1">
                        <span class="label_grp">Package duration</span>
                        <input type="text" name= 'packageDuration'value="<?php echo $row['package_duration'];?>" placeholder='Package Duaration '>
                    </div>

                    <div class="details1">
                        <span class="label_grp">price</span>
                        <input type="text" name='price' value="<?php echo $row['price'];?>" placeholder='Price '>
                    </div>

                    <div class="details1 textarea">
                        <span class="label_grp">Description</span>
                        <textarea name="descriptions" id="" rows='15' ><?php echo $row['description'];?></textarea>
                    </div>

                    <div class="submit_button">
                 <button class="Post_Submit" name='submit' id='submitHere'>Update</button>
                 </div>
                </div>
            </form>
            <?php
                }
            ?>

        </div>
    </section> 
</body>
<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function(){
    $('#categorys').on('change',function(){
    var categorysId=$(this).val();
    $.ajax({
    method: "POST",
    url: "ajaxfile.php",
    data:{categorys:categorysId},
    dataType:"html",
    success: function(data){
    $("#packageId").html(data);
    }

    });
  });
});

</script>

</body>

</html>
