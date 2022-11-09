<?php
session_start();
$uid=$_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/b_v.css">
    
    <title>Document</title>

    <style>
        .bills{
        
            width:90%;
            height:100%;
            position: relative;
            left:200px;
            /* top:30px; */
            overflow:hidden;
        }
        .content{
            margin-bottom:20px;
            
        }
    </style>
</head>
<body>
<?php
    include "partials/connection.php";
    include 'partials/nav.php';


    $sql="SELECT t1.Id as bookingid,t3.Fname as Name, t3.email as email,t2.Title_name as title,t2.package_duration as PackageDuration, t2.Price as Price,t2.Description as Description,t4.Name as category_name,t5.package as PackageName ,payement,payement_Type FROM booking as t1 

    join addpost as t2 on t1.package_id =t2.Id 
    join register_details as t3 on t1.user_id=t3.Sno 
    join categorys as t4 on t2.category=t4.Id 
    join newpackage as t5 on t2.Package=t5.Id where t1.Id ='$uid'";

$result=mysqli_query($connection,$sql);
$Sno=1;
$row=mysqli_fetch_assoc($result);
$bookingid=$row['bookingid'];
    ?>
    <section class="bills" style='margin-top:30px'>
        <div class="content">
            <table class="tables">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <td>
                            <?php echo $Sno; ?>
                        </td>
                        <th>Name</th>
                        <td>
                            <?php echo $row['Name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <th>Category</th>
                        <td>
                            <?php echo $row['category_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Package Name:</th>
                        <td>
                            <?php echo $row['PackageName']; ?>
                        </td>
                        <th>Title</th>
                        <td>
                            <?php echo $row['title']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Package Duration</th>
                        <td>
                            <?php echo $row['PackageDuration']; ?>
                        </td>
                        <th>Price</th>
                        <td>
                            <?php echo $row['Price']; ?>
                        </td>
                        <?php $pricess=$row['Price']; ?>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td colspan="3" >
                            <?php echo $row['Description']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>PaymentType</th>
                        <td colspan="3">
                            <?php echo $ptype=$row['payement_Type']; 
                            if($ptype==''){
	                            echo "Payment not made yet";
                            }
                            else{
                                $ptype;
                            }
                                ?>
                        </td>

                    </tr>
                </thead>
            </table>
        </div>
<?php
$sql="SELECT * FROM PAYEMENTS WHERE BookingId=bookingid"
?>
        <div class="content">
            <table class="tables">
                <thead>
                    <tr >
                        <th>Name</th>
                        <th>Amount</th>
                        <th>payement Type</th>
                    </tr>
                    <td>
                        <?php echo $row['Name']; ?>
                    </td>
                    <td>
                    <?php
                    if($ptype==''){
	                         $pricess ="Payment not made yet";
                            }
                            else{
                                $pricess=$row['Price'];
                            }
                            ?>
                        <?php echo $pricess ?>
                    </td>
                    <td>
                
                        <?php echo $pricess ?>
                    </td>

                    <tr>
                        <th>Total</th>
                            <td colspan="2">
                                <?php echo $row['Price']; ?>
                            </td>
                    </tr>

                    </thead>
            </table>
        </div>
    </section>
</body>
</html>