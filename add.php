<?php
session_start();
include "partials/connection.php";
$uid=$_SESSION['uid'];

    if(isset($_POST['submit'])){
    $pid=$_POST['ids'];
    $check="Select * from booking where user_id='$uid'";
    $result=mysqli_query($connection,$check);
    $num=mysqli_num_rows($result);
    if($num>=1){
        echo "<script>alert('You already booked.');</script>";
        session_start();
        $_SESSION['Booking']=true; 
        echo "<script>window.location.href='booking_confirm.php'</script>";
    }
    
    else{
    $sql="INSERT INTO `booking` ( `package_id`, `user_id`) VALUES ('$pid','$uid')";
    $result=mysqli_query($connection,$sql);
        if($result){
            echo "<script>
            alert('Package has been booked.');
            window.location.href='booking_confirm.php'
            </script>";

            }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bk.css">

    <title>Document</title>
</head>
<body>
    <?php
    include 'home.php';
    ?>

<section class="booking">
    <div class="main">
    <?php
    include "partials/connection.php";
    $sql="SELECT t1.Id as packageId,t2.*,t3.*,t1.* FROM addPost as t1 join Categorys as t2 on t1.Category=t2.Id join newpackage as t3 on t1.Package=t3.Id";
    $resilt=mysqli_query($connection,$sql);
    while($row=mysqli_fetch_assoc($resilt)){
        ?>

                <div class="cont">
                    <div class="booking-box">
                        <h2><?php echo $row['Title_name'];?></h2>
                    </div>
                    <div class="price">
                        <h2> <?php echo $row['price'];?> Rs</h2>
                        <p><?php echo $row['package_duration'];?></p>
                    </div>
                    <div class="content">
                        <p><?php echo $row['description'];?></p>
                    </div>
                    <div class="butto">
                        <form action="" method='POST'>
                            <input type="hidden" name="ids" value='<?php echo $row['Id'];?>'>
                            <button class="book" name='submit' type='submit' onclick="myfun();">Booking now</button>
                         </form>
                    </div>
                </div>  
                <?php } ?>
            </div>
        </section>
        <script>
            function myfun() {
               var rtn= confirm("Do you want to  Book a package?");
                if(rtn){
                    window.location.href='add.php'
                    
                }
                //     else{
                        
                //         window.location.href='add.php'
                // }            
            }
        </script>
</body>
</html>