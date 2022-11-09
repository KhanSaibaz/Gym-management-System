
<?php
// Session is used to information across difference page

session_start();
session_unset();
session_destroy();


header('location:login.php');
exit;
?>
