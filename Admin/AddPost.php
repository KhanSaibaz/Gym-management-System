<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    include '../partials/connection.php';
    $category=$_POST['categorys'];
    $package=$_POST['package'];
    $Title_name=$_POST['Title_name'];
    $package_duration=$_POST['package_duration'];
    $price=$_POST['price'];
    $description=$_POST['desc'];
        
    $sql_check="select * from addpost WHERE Title_name ='$Title_name'"; 
    $check=mysqli_query($connection,$sql_check);
    $num=mysqli_num_rows($check);

    if($num<=0){

       $SQL= "INSERT INTO `addpost` (`Category`, `Package`, `Title_name`, `package_duration`, `price`, `description`) VALUES ('$category', '$package', '$Title_name', '$package_duration', '$price', '$description')";
       
       
       

        $Insertcheck=mysqli_query($connection,$SQL);

        if($Insertcheck){
            echo '<script type="text/JavaScript">
            alert("Post Added Sucessfully");
            </script>';
        }

    }
    else{
        echo '<script type="text/JavaScript">
        alert("Already Exit");
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
            <h1 style='color:red; text-align:center;' >Add Booking Package</h1>
            <hr>
            <form action="../Admin/AddPost.php" method="POST">
                <div class="maindet">

                    <div class="details1">
                        <span for="from-group" class="label_grp">Cateogory</span>
                        <select name="categorys" id="categorys" class="DropDown" >
                            <option value="">--select--</option>
                            <?php
                                include "../partials/connection.php";
                                $sql="SELECT * FROM `categorys`";
                                $categorys_execute=mysqli_query($connection,$sql);
                                while($row=mysqli_fetch_assoc($categorys_execute)){
                                echo "<option value='".$row['Id']."'>".$row['Name']."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="details1">
                        <span class="label_grp">Package</span>
                        <select name="package" id="packageId" class="DropDown"> 
                        </select>
                    </div>

                    <div class="details1">
                        <span class="label_grp">Title Name</span>
                        <input type="text" name='Title_name' placeholder='Enter the Title name '>
                    </div>

                    <div class="details1">
                        <span class="label_grp">Package duration</span>
                        <input type="text" name= 'package_duration' placeholder='Package Duaration '>
                    </div>

                    <div class="details1">
                        <span class="label_grp">price</span>
                        <input type="text" name='price' placeholder='Price '>
                    </div>

                    <div class="details1 textarea">
                        <span class="label_grp">Description</span>
                        <textarea name="desc" id="" rows='15' ></textarea>
                    </div>

                    <div class="submit_button">
                 <button class="Post_Submit" id='submitHere'>Submit</button>
                 </div>
                </div>


            </form>

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

<?php
                