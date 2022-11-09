<?php

// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
// {
//     header('location:about.php');
//     $_SESSION['loggedin']=true;
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about.css">
    <title>Document</title>
</head>
<body>
<?php
    include 'partials/nav.php';
    ?>
    <section class="aboutsect">
        <div class="main">
            <div class="Abouthead">
                <h1 >ABOUT US</h1>
            </div>
            <div class="textcont">
                <p>	</p>
            </div>
        </div>
    </section>

	<section class="content_section">
        <div class="about_img">
        <img src="Img/about_logo.png" alt="">
        </div>
		<div class="text">
            <p>A gymnasium, also known as a gym, is a covered location for athletics. The word is derived from the ancient Greek term "gymnasium".[1] They are commonly found in athletic and fitness centres, and as activity and learning spaces in educational institutions. "Gym" is also slang for "fitness centre", which is often an area for indoor recreation. A "gym" may include or describe adjacent open air areas as well. In Western countries, "gyms" (or pl: gymnasia") often describe places with indoor or outdoor courts for basketball, hockey, tennis, boxing or wrestling, and with equipment and machines used for physical development training, or to do exercises. In many European countries, Gymnasium (and variations of the word) also can describe a secondary school that prepares students for higher education at a university, with or without the presence of athletic courts, fields, or equipment.</p>
        </div>
	</section>
	
</body>
</html>