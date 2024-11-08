<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    // we made connection here
    $conn = mysqli_connect("10.101.8.49","dbuser","DBUser123","crud_12_new") or die("connection failed");
    // mysql command
    $sql= "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
    
    $result = mysqli_query($conn, $sql) or die("query unsuccessful");
// evn if single record comes just fetch and print it
    if(mysqli_num_rows($result)> 0) {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            // because it is an associative array
            // this loop will run for every row and fetch data
        while ($row = mysqli_fetch_assoc($result)) {   
       

            ?>
            <tr>
                <td> <?php echo $row['sid'] ?> </td>
                <td><?php echo $row['sname']  ?> </td>
                <td><?php echo $row['saddress']  ?> </td>
                <td><?php echo $row['cname']  ?> </td>
                <td><?php echo $row['sphone']  ?> </td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid'] ?>'>Edit</a>
                    <a href='delete-inline.php'>Delete</a>
                </td>
            </tr>
            <?php }
    ?>
        </tbody>
    </table>
    <?php }
    else{
        echo "<h2> no record found</h2>";

    }
    mysqli_close($conn);
    ?>
</div>
</div>
</body>
</html>
