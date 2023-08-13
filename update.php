<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
    if(isset($_POST['showbtn'])) {//checks the click of the button
        $conn = mysqli_connect("localhost", "root", "", "crud_php") or die("Connection Failed");
        $stu_id = $_POST['sid'];
        $sql = "SELECT * FROM student WHERE sid = {$stu_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid" value="<?php echo $row['sid'];?>" />
            <input type="text" name="sname" value="<?php echo $row['sname'];?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress'];?>" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <?php
                $sql2 = "SELECT * FROM studentclass";
                $result1 = mysqli_query($conn, $sql2) or die("Query Unsuccessful");
                if(mysqli_num_rows($result1) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)) {
                        if($row['sclass'] == $row1['cid']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                ?>
                <option <?php echo $selected; ?> value="<?php echo $row1['cid'];?>"><?php echo $row1['cname'];?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone'];?>" />
        </div>
        <input class="submit" type="submit" value="Update" />
    </form>
    <?php
            }
        }
    }
    ?>
</div>
</body>
</html>
