<?php 
echo $stu_name = $_POST['sname'];
echo $stu_rollNo = $_POST['sroll'];
echo $stu_class = $_POST['class'];
echo $stu_email = $_POST['semail'];

// connecting with sql database
$conn = mysqli_connect('localhost', 'root', '', 'attendance_db') or die("connection failed");

$sql = "INSERT INTO student_details(name,roll_no,email_id)
        values
        ('{$stu_name}','{$stu_rollNo}','{$stu_email}')";

$reult = mysqli_query($conn, $sql) or die('query unsuccessful');

header('Location: http://localhost/MYattendenceApp/practice/crud/index.php');

mysqli_close( $conn );

?>