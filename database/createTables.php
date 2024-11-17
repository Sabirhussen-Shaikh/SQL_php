<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path."\attendenceApp\database\database.php";

$dbo = new Database();

$c = "create table sepTABLE (id int , name varchar(20),contact varchar(10))";

$st = $dbo->conn->prepare("$c");
$st->execute();
?>