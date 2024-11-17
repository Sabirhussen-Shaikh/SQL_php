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

// ******************************************** 
$c = "insert into student_details
(id,roll_no,name)
values
(1,'CSB21001','Emily Johnson'),
(2,'CSB21002','Michael Smith'),
(3,'CSB21003','Sarah Martinez'),
(4,'CSB21004','David Brown'),
(5,'CSB21005','Olivia Williams'),
(6,'CSB21006','Christopher Davis'),
(7,'CSB21007','Sophia Wilson'),
(8,'CSB21008','Ethan Anderson'),
(9,'CSB21009','Emma Miller'),
(10,'CSB21010','James Jones')";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
} catch (PDOException $o) {
    echo ("<br>duplicate entry");
}


$c = "insert into faculty_details
(id,user_name,password,name)
values
(1,'rcb','123','Ram Charan Baishya'),
(2,'arindam','123','Arindam Karmakar'),
(3,'pal','123','Pallabi'),
(4,'anuj','123','Anuj Agarwal'),
(5,'mriganka','123','Mriganka Sekhar'),
(6,'manooj','123','Manooj Hazarika')";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
} catch (PDOException $o) {
    echo ("<br>duplicate entry");
}


$c = "insert into session_details
(id,year,term)
values
(1,2023,'SPRING SEMESTER'),
(2,2023,'AUTUMN SEMESTER')";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
} catch (PDOException $o) {
    echo ("<br>duplicate entry");
}


$c = "insert into course_detail
(id,title,code,credit)
values
    (1,'Database management system lab','CO321',2),
    (2,'Pattern Recognition','CO215',3),
    (3,'Data Mining & Data Warehousing','CS112',4),
    (4,'ARTIFICIAL INTELLIGENCE','CS670',4),
    (5,'THEORY OF COMPUTATION ','CO432',3),
    (6,'DEMYSTIFYING NETWORKING ','CS673',1)";
$s = $dbo->conn->prepare($c);
try {
    $s->execute();
} catch (PDOException $o) {
    echo ("<br>duplicate entry");
}

// ************************************************ 

// copied code 
// $c = "insert into student_details
// (id,roll_no,name)
// values
// (1,'CSB21001','Emily Johnson'),
// (2,'CSB21002','Michael Smith'),
// (3,'CSB21003','Sarah Martinez'),
// (4,'CSB21004','David Brown'),
// (5,'CSB21005','Olivia Williams'),
// (6,'CSB21006','Christopher Davis'),
// (7,'CSB21007','Sophia Wilson'),
// (8,'CSB21008','Ethan Anderson'),
// (9,'CSB21009','Emma Miller'),
// (10,'CSB21010','James Jones'),
// (11,'CSB21011','Ava Taylor'),
// (12,'CSB21012','Daniel Thomas'),
// (13,'CSM21001','Mia Garcia'),
// (14,'CSM21002','William White'),
// (15,'CSM21003','Chloe Martin'),
// (16,'CSM21004','Benjamin Clark'),
// (17,'CSM21005','Isabella Hall'),
// (18,'CSM21006','Alexander Lee'),
// (19,'CSM21007','Grace Lewis'),
// (20,'CSM21008','Samuel Turner'),
// (21,'CSM21009','Natalie Harris'),
// (22,'CSM21010','Caleb Baker'),
// (23,'CSM21011','Lily Reed'),
// (24,'CSM21012','Logan Murphy')
// ";

// $s = $dbo->conn->prepare($c);
// try {
//   $s->execute();
// } catch (PDOException $o) {
//   echo ("<br>duplicate entry");
// }


// $c = "insert into faculty_details
// (id,user_name,password,name)
// values
// (1,'rcb','123','Ram Charan Baishya'),
// (2,'arindam','123','Arindam Karmakar'),
// (3,'pal','123','Pallabi'),
// (4,'anuj','123','Anuj Agarwal'),
// (5,'mriganka','123','Mriganka Sekhar'),
// (6,'manooj','123','Manooj Hazarika')";

// $s = $dbo->conn->prepare($c);
// try {
//   $s->execute();
// } catch (PDOException $o) {
//   echo ("<br>duplicate entry");
// }


// $c = "insert into session_details
// (id,year,term)
// values
// (1,2023,'SPRING SEMESTER'),
// (2,2023,'AUTUMN SEMESTER')";

// $s = $dbo->conn->prepare($c);
// try {
//   $s->execute();
// } catch (PDOException $o) {
//   echo ("<br>duplicate entry");
// }


// $c = "insert into course_details
// (id,title,code,credit)
// values
//   (1,'Database management system lab','CO321',2),
//   (2,'Pattern Recognition','CO215',3),
//   (3,'Data Mining & Data Warehousing','CS112',4),
//   (4,'ARTIFICIAL INTELLIGENCE','CS670',4),
//   (5,'THEORY OF COMPUTATION ','CO432',3),
//   (6,'DEMYSTIFYING NETWORKING ','CS673',1)";
// $s = $dbo->conn->prepare($c);
// try {
//   $s->execute();
// } catch (PDOException $o) {
//   echo ("<br>duplicate entry");
// }

// //if any record already there in the table delete them
// clearTable($dbo, "course_registration");
// $c = "insert into course_registration
//   (student_id,course_id,session_id)
//   values
//   (:sid,:cid,:sessid)";
// $s = $dbo->conn->prepare($c);
// //iterate over all the 24 students
// //for each of them chose max 3 random courses, from 1 to 6

// for ($i = 1; $i <= 24; $i++) {
//   for ($j = 0; $j < 3; $j++) {
//     $cid = rand(1, 6);
//     //insert the selected course into course_registration table for 
//     //session 1 and student_id $i
//     try {
//       $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);
//     } catch (PDOException $pe) {
//     }

//     //repeat for session 2
//     $cid = rand(1, 6);
//     //insert the selected course into course_registration table for 
//     //session 2 and student_id $i
//     try {
//       $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 2]);
//     } catch (PDOException $pe) {
//     }


?>