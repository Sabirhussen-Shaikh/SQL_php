<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendence_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully sabir";

    //actual code starts

    //to make table code
    try {
        //sql cmd 
        $cmd = "create table tab2 (
            id int auto_increment primary key,
            col2 varchar(20)
        )";

        //prepaid statement
        $st = $conn->prepare($cmd);
        $st->execute();
    } 
    catch(PDOException $e) {
        echo "<br>table is already created<br> " . $e->getMessage();
    }
    
    //practice of table creation
    try {
        $cmd = "create table tab3 (
            sid int ,
            sName varchar(20),
            sContact int
        )";
        $st = $conn->prepare($cmd);
        $st->execute();
    } catch (PDOException $e) {
        echo "<br>table creation practice failed<br>" . $e->getMessage();
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>