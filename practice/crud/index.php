<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    // connecting with sql database
    $conn = mysqli_connect('localhost', 'root', '', 'attendance_db') or die("connection failed");

    $sql = "select * from student_details ";

            // $sql = "select * from student_details s
            // left join course_registration cr on s.id = cr.student_id 
            // join course_details c on c.id = cr.course_id
            // ";

    $reult = mysqli_query($conn, $sql) or die('query unsuccessful');

    if (mysqli_num_rows($reult) > 0) {
    ?>
        <table cellpadding="7px">
            <thead>
                <th>ID</th>
                <th>ROLL NO</th>
                <th>Name</th>
                <!-- <th>COURSE CODE</th> -->
                <th>EMAIL</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($reult)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['roll_no'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <!-- <td><?php echo $row['id'] ?></td> -->
                        <td><?php echo $row['email_id'] ?></td>
                        <td>
                            <a href='edit.php'>Edit</a>
                            <a href='delete-inline.php'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php }else {
        echo'<br><h2></h2> NO RECORD FOUND <br>';
    } 
    
    mysqli_close($conn)
    ?>
</div>

<!-- below code complete the header php  -->
</div>
</body>

</html>