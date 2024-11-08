<?php
// Retrieving data from POST request
$stu_id= $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];

// Create connection to the database
$conn = mysqli_connect("10.101.8.49","dbuser","DBUser123","crud_12_new") or die("connection failed");

// MySQL update command
$sql= "UPDATE student SET sname= '{$stu_name}', saddress= '{$stu_address}', sclass='{$stu_class}', sphone='{$stu_phone}' WHERE sid={$stu_id}";

// Execute the query
$result = mysqli_query($conn, $sql) or die("query unsuccessful");

// Redirect to another page after successful insertion
header("Location: http://localhost/testing/PHPulse-/index.php");

// Close the database connection
mysqli_close($conn);
