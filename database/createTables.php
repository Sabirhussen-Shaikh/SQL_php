<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path."\attendenceApp\database\database.php";

$dbo = new Database();

//table 1
$c = "create table student_details (
        id int auto_increment primary key,
        roll_no varchar(10) unique,
        name varchar(50)
    )";

$st = $dbo->conn->prepare($c);

try {
    $st->execute();
    echo"<br>table student_details is created<br>";
} catch (PDOException $e) {
    echo"<br>table student_details is not created<br>" .  $e->getMessage();
}

//table 2
$c = "create table course_detail (
        id int auto_increment primary key,
        code varchar(20) unique,
        title varchar(50),
        credit int
    ) ";

$st = $dbo->conn->prepare($c);
try {
    $st->execute();
    echo "<br>table course_detail is created<br>";
} 
catch (PDOException $e) {
    echo "<br>table course_detail is not created<br>". $e->getMessage();
}

//table 3
$c = "create table faculty_details (
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";

$st = $dbo->conn->prepare($c);

try {
$st->execute();
echo"<br>table faculty_details is created<br>";
} catch (PDOException $e) {
echo"<br>table faculty_details is not created<br>" .  $e->getMessage();
}

//table 4
$c = "create table session_details (
    id int auto_increment primary key,
    year int ,
    term varchar(50),
    unique(year,term)
)";

$st = $dbo->conn->prepare($c);

try {
$st->execute();
echo"<br>table session_details is created<br>";
} catch (PDOException $e) {
echo"<br>table session_details is not created<br>" .  $e->getMessage();
}

//table 5
$c = "create table course_registration (
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";

$st = $dbo->conn->prepare($c);

try {
$st->execute();
echo"<br>table course_registration is created<br>";

} catch (PDOException $e) {
echo"<br>table course_registration is not created<br>" .  $e->getMessage();
}

//table 6
$c = "create table course_allotment (
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";

$st = $dbo->conn->prepare($c);

try {
$st->execute();
echo"<br>table course_allotment is created<br>";

} catch (PDOException $e) {
echo"<br>table course_allotment is not created<br>" .  $e->getMessage();
}

//table 7
$c = "create table attendence (
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";

$st = $dbo->conn->prepare($c);

try {
$st->execute();
echo("<br>table attendence is created<br>");
} catch (PDOException $e) {
echo"<br>table attendence is NOT created<br>" .  $e->getMessage();
}

?>