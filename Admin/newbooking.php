<?php
        include "../partials/connection.php";

    $uid=$_GET['ids'];
    echo $uid;
    if(isset($_POST['submit']))
    { 
      $bookingiid=$_POST['bookingiid'];
     $Paymenttype=$_POST['Paymenttype'];
     if($Paymenttype=='Full Payment'){
            $ParcialPayment=$_POST['fullamount'];
     }
    else{
    $ParcialPayment=$_POST['ParcialPayment'];
    }
    // endif{
            
    // $tpay=$_POST['totalpayment'];
    // echo $bookindid;
    // echo $bookingiid;  
    // }
    $sql1="INSERT INTO `payements` ( `BookingId`, `paymentTpye`, `payement`) VALUES ( '$uid', '$Paymenttype ', '$ParcialPayment')
    ";
        if($sql1){
            $sql2="UPDATE booking set Payement_Type='$Paymenttype' WHERE Id='$uid'";
    $res2=mysqli_query($connection,$sql2);

        }
    $res=mysqli_query($connection,$sql1);
    echo "<script>alert('Payment Details has been updated.');</script>";
echo "<script> window.location.href = 'NewMember.php';</script>";
    }
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
    include  'Dashboard.php';
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
                        <td colspan="3">
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
          
            <?php
        include "../partials/connection.php";

    $sql="SELECT * FROM payements where BookingId='$uid'";
    $res=mysqli_query($connection,$sql);
    $num=mysqli_num_rows($res);
    if($num > 0)
    {
        ?>
            <table class="table table-hover table-bordered">
                <tr>
                    <th colspan="3" style="text-align:center;font-size:20px;">Payment History</th>
                </tr>
                <tr>
                    <th>Payment Type</th>
                    <th>Amount Paid</th>
                    <th>Payment Date</th>
                </tr>
                <?
              while($row=mysqli_fetch_assoc($res))
                  { ?>
                <tr>
                    <td>
                        <?php echo $row['paymentTpye']; ?>
                    </td>
                    <td>
                        <?php echo $tpayment =$row['payement']; ?>
                    </td>
                    <td>
                        <?php echo $row['PayementDate']; ?>
                    </td>
                </tr>

                <?php
        $tpayment+=$tpayment;
        } ?>
                <tr>
                    <th>Total</th>
                    <th>
                        <?php echo $gpayment;?>
                    </th>
                </tr>
            </table>

            <td>
                <?php 
                if($ptype=='Full Payment')
                {
                  echo ' <button type="button" class="btts btn btn-primary" disabled="" data-toggle="modal" data-target="#myModal">Tack Action</button>';

                }
                else{
echo ' <button type="button" class="btts btn btn-primary" data-toggle="modal" data-target="#myModal">Tack Action</button>';                }

               ?>


            </td>

            </table>


        </div>
    </section>
  <script src="../AdminJS/pays.js"></script>

</body>

</html>
<section class="payement pays">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
        <form method="post">
          <div class="row">
            <div class="col-md-12">

              <label>Payment Type</label>
              <select name="Paymenttype" id="Payment" class=" selects form-control">
                <option value="">--select--</option>
                <option value="Partial Payment">Partial Payment</option>
                <option value="Full Payment">Full Payment</option>
              </select>

              <input type="hidden" name="bookingiid" id="bookingiid" value="<?php echo $uid; ?>">
            
              <br>
            </div>

            <div class="col-md-12" id="ParcialPay">
              <label>Partial Payment</label>
              <input type="text" name="ParcialPayment" id="ParcialPayment" class="form-control">
              <input type="hidden" class='Rupees' name="totalpay" value="<?php echo $gpayment;?>">
              <br>
            </div>
            <input type="hidden"  name="fullamount" value="<?php echo $pricess-$gpayment;?>">
          </div>
          
          <input type="submit" name="submit" id="submit" class="bts btn btn-primary" value="Submit">
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="closes btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</section>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" ></script> -->

<script>
  $(document).ready(function () {
    $('#ParcialPay').hide();
    $('#Payment').change(function () {
      if ($('#Payment').val() == 'Partial Payment') {
        $('#ParcialPay').show();
      }
      else {
        $('#ParcialPay').hide();
      }

    });

  });



</script>


