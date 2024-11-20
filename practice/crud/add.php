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
            <label>Course</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
                <?php
                // connecting with sql database
                $conn = mysqli_connect('localhost', 'root', '', 'attendance_db') or die("connection failed");

                $sql = "select * from course_details ";

                $reult = mysqli_query($conn, $sql) or die('query unsuccessful');

                while ($row = mysqli_fetch_assoc($reult)) {
                ?>
                <option value="<?php $row['id']; ?>"><?php echo $row['title']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save" />
    </form>
</div>
</div>
</body>

</html>