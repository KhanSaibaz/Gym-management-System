<?php
    $bId=$_GET['ids'];
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AdminCSS/newbooking.css">
    <title>Document</title>
</head>

<body>
    <?php
    // include  'Dashboard.php';
    include "../partials/connection.php";
    
      $sql="SELECT t1.Id as bookingid,t3.Fname as Name, t3.Email as email,t2.Title_name as title,t2.package_duration as PackageDuration, t2.Price as Price,t2.Description as Description,t4.Name as category_name,t5.package as PackageName ,payement,payement_Type FROM booking as t1 
    join addpost as t2 on t1.package_id =t2.Id 
    join register_details as t3 on t1.user_id=t3.Sno 
    join categorys as t4 on t2.category=t4.Id 
    join newpackage as t5 on t2.Package=t5.Id where t1.Id ='$uid'";


    $result=mysqli_query($connection,$sql);
    while ($row=mysqli_fetch_assoc($result)) {
        $cnt=0;
        ?>

    <section class="bills">
        <div class="content">
            <table class="tables">
                <thead>
                    <tr>
                        <th>Booking Date</th>
                        <td>
                            <?php echo $row['bookingid']; ?>
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
                            <?php echo $ptype=$row['payement_Type']; ?>
                        </td>

                    </tr>
                    <?php  $cnt=$cnt+1; } ?>
                </thead>
            </table>
            <div class="button">
                <button class="btts">Take action</button>
            </div>

        </div>
    </section>
</body>

</html>
<!-- <section class="payement">
    <div class="opt">
        <form action="">
            <label for="">Payement Type</label>
            <select name="payements" id="pays">
                <option value="">---SELECT---</option>
                <option value="Partial Payement">partial Payement</option>
                <option value="Full Payement">Full Payement</option>
            </select>

            <div id="pays" id='partialspay'>
                <label for=""> Amount to be Paid</label>
                <input type="hidden" name="totalpay" id='partials' value="<?php echo $gpayment;?>">
                <input type="text" class='Rupees'>
            </div>

            <div class="sub">
                <button class="bts">Submit</button>
            </div>

            <div class="close">
                <button class="closes">Close </button>
            </div>

    </div>
    </form>
</section>

<script>
    $(document).ready(function () {
        $('#partialspay').hide();
        $('#pays').change(function () {
            if ($('#Payment').val() == 'Partial Payment') {
                $('#partialspay').show();
            }
            else {
                $('#partialspay').hide();
            }

        });

    });
</script> -->