<?php
include '../Admin/Dashboard.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AdminCSS/package.css">
    
    <title>Document</title>
</head>
<body>
    <Section class="main_section">
        <div class="main_container">
            <div class="from">
                <form action="">

                        <?php
                        include "../partials/connection.php";
                        $sql1="SELECT * FROM `Category`";
                        $category_execute1=mysqli_query($connection,$sql1);
                    echo '<div class="content">';
                        echo '<label for="from-group" class="label_grp">Select Cateogory</label>';
                        echo '<select name="category" id="category" class="DropDown">   
                            <option value="saab">--select--</option>';

                        while($row1=mysqli_fetch_assoc($category_execute1)){
                        echo "<option value='".$row1['Sno']."'>".$row1['Name']."</option>";
                        }
                    echo '</div>';

                    echo '<div class="content">';

                        $sql2="SELECT * FROM `addpackage`";
                        $category_execute2=mysqli_query($connection,$sql2);

                        echo '<select name="category" id="category" class="DropDown">';   
                        echo '<label for="from2-group" class="label_grp">Select Package</label>';
                        echo '<select name="Package" id="Package" class="DropDown">
                            <option value="package">--select--</option>';

                        while($row2=mysqli_fetch_assoc($category_execute2)){
                        echo "<option value='".$row2['Sno']."'>".$row2['Package']."</option>";
                        }
                    echo '</div>';

                        ?>
                    <div class="content1">
                        <label for="form-name">Title Name</label>
                        <input type="text" class="inputs" name="Title" id="" placeholder="Enter your Title name">
                    </div>
                    
                </form>
            </div>
        </div>
    </Section>
</body>
</html>