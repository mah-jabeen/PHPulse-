<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <!-- PHP SELF means when we will click on this button so its php code will not externally available it can be found inside it -->
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
<?php 

if(isset($_POST['showbtn'])){
    include 'config.php';
    // the value that super global variable is giving will save into this
$stu_id= $_POST['sid'];
    $sql= "SELECT * FROM student WHERE sid = {$stu_id}";
    
    $result = mysqli_query($conn, $sql) or die("query unsuccessful");
// evn if single record comes just fetch and print it
    if(mysqli_num_rows($result)> 0) {
        // any record that is coming will save into this while loop
        while($row = mysqli_fetch_assoc($result)) {


?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php echo $row['sid']; ?>" />
            <input type="text" name="sname" value="<?php echo $row['sname']; ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        
        <?php
          $sql1 = "SELECT * FROM studentclass";
          $result1 = mysqli_query($conn, $sql1) or die("query unsuccessful");

          if(mysqli_num_rows($result1)> 0) {
            echo'<select name="sclass">';          
              // any record that is coming will save into this while loop
            while($row1 = mysqli_fetch_assoc($result1)) {
            // we are making conditions for if user is selecting certain class so it will be coming showing in updation field
            if($row['sclass'] == $row1['cid']) {
                $select = "selected";
            } else {
                $select = "";
            }
            // wrote select here so that the field will be stay selected
            echo "<option {$select}value='{$row1['cid']}'>{$row1['cname']}</option>";
            }
         echo "</select>";
        }
          ?>

        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone']; ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php 
        }
    }
}
    ?>
</div>
</div>
</body>
</html>
