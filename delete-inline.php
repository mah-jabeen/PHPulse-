<?php
echo $stu_id= $_GET['id'];

include 'config.php';
   // mysql command
   $sql= "DELETE FROM student WHERE sid={$stu_id}";
   
   $result = mysqli_query($conn, $sql) or die("query unsuccessful");

   header("Location: http://localhost/testing/PHPulse-/index.php");
   mysqli_close($conn);
?>