<?php
include "config.php";
$sql= "select * from students";
$result= mysqli_query($conn , $sql) or die("Not Query Result");
?>
