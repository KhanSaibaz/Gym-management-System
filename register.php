<?php
include 'partials/nav.php';
$showalert=false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include "partials/connection.php";
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $Email=$_POST['email'];
    $Phone=$_POST['phone'];
    $State=$_POST['State'];
    $City=$_POST['City'];
    $Password=$_POST['password'];
    $CPassword=$_POST['Cpassword'];

    // Check username is exit or not 

    $exitsql="SELECT * FROM register_details WHERE Email='$Email'";
    $resultexits=mysqli_query($connection,$exitsql);
    $num_exist_row=mysqli_num_rows($resultexits);

    // IF query was executed then num_exist_row return 1 which break these if condition and executed else 
    if($num_exist_row>0){

    }
    
    else{
        // check password and confirm password  is match or not 
        if(($Password==$CPassword) ){
            $hash=password_hash($Password,PASSWORD_DEFAULT);
                $SQL="INSERT INTO `register_details` (`Fname`, `Lname`, `Email`, `Phone`, `State`, `City`, `Password`) VALUES ( '$Fname', '$Lname', '$Email', '$Phone', '$State', '$City', '$hash')";
                $result=mysqli_query($connection,$SQL);
                    if($result){
                        $showalert=true;
                        header('location:login.php');
                    }
        }
            else {
                echo '<script type="text/JavaScript">
				alert(" Password does not match");
				</script>';

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
    <script src="js/register.js"></script>
    <link rel="stylesheet" href="css/register.css">

    <title>Register</title>
</head>
<body>
  

    <section class="register_sect">
                <div class="register_content">
                    <h1>Register</h1>
                </div>
    </section>

<!--  -->
    <div class="register">
    <form action="../PHP_GYM/register.php" method="POST">
        <input type="text" name="Fname" class="UserInput" placeholder="First Name" >

        <input type="text" name="Lname"  class="UserInput" placeholder="Last Name" >

        <input type="email" name="email" id="" class="UserInput" placeholder="Your Email">

        <input type="number" name="phone" id="" class="UserInput" placeholder="Mobile Number">

        <input type="text"  name="State" class="UserInput" placeholder="State">

        <input type="text" name="City" class="UserInput" placeholder="City">

        <input type="password" name="password" id="myInput" class="UserInput" placeholder="Password">

        <input type="password" name="Cpassword" id="myInput" class="UserInput" placeholder="Confirm Password">


        <button type="Submit"class="registerButton" onclick="showAlert()">Register </button>
    </form>
    </div>


</body>
</html>



