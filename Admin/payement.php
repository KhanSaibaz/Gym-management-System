<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AdminCSS/payement.css">
    <title>Document</title>
</head>
<body>
<?php
    include 'Dashboard.php';
    ?>

    <section class="payements">
        <div class="sub">
    <div class="type">
        <a href="fullpayement.php">
            <div class="container first">
                <h2>
                    FULL PAYEMENT
                </h2>
            </div>
        </a>
        <a href="partialpayement.php">
            <div class="container second">
                <h2>
                    PARTIAL PAYEMENT
                </h2>
            </div>
        </a>
      
    </div>
    <a href="allpayement.php">
    <div class="full-container">
            <h2>
                ALL PAYEMENT
            </h2>
        </div>
    </a>
</div> 
    </section>
</body>
</html>