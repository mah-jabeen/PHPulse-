<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
              
                <?php
    // we made connection here
    $conn = mysqli_connect("10.101.8.49","dbuser","DBUser123","crud_12_new") or die("connection failed");
    // mysql command
    // here we wil fetch data from student class
    $sql= "SELECT * FROM  studentclass";
    
    $result = mysqli_query($conn, query: $sql) or die("query unsuccessful");
    
    // this result variable will become array
    while($row = mysqli_fetch_assoc($result)){
    ?>
                    <!-- we make row cid in value because it will be the value of cname -->
                <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
