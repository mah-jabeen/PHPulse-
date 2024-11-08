<?php
// Retrieving data from POST request
echo $stu_name = $_POST['sname'];
echo $stu_address = $_POST['saddress'];
echo $stu_class = $_POST['sclass'];
echo $stu_phone = $_POST['sphone'];

// Create connection to the database
$conn = mysqli_connect("10.101.8.49", "dbuser", "DBUser123", "crud_12_new") or die("Connection failed");

// MySQL INSERT command
$sql = "INSERT INTO student (sname, saddress, sclass, sphone) 
        VALUES ('{$stu_name}', '{$stu_address}', '{$stu_class}', '{$stu_phone}')";

// Execute the query
$result = mysqli_query($conn, $sql) or die("Query unsuccessful.");

// Redirect to another page after successful insertion
header("Location: http://localhost/PHPulse-/index.php");

// Close the database connection
mysqli_close($conn);
?>
