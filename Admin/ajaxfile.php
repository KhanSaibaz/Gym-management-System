
<?php
if(isset($_POST["categorys"])) 
{
  include  '../partials/connection.php';
    $id=$_POST["categorys"];
    
    $sql="SELECT * From newpackage WHERE Category_id='$id'";
    $result=mysqli_query($connection,$sql);
  
    while($row =mysqli_fetch_assoc($result))
    {
    ?>
    <option value="<?php echo $row["Id"]; ?>"><?php echo $row["package"]; ?></option>
<?php
  }
}
?>