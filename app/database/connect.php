<?php
$host = 'localhost:3307';
$user = 'root';
$password = '';
$db_name = 'blog';

$conn = new mysqli($host , $user , $password, $db_name);

if($conn->connect_error){
    die('Database connection error:'. $conn->connect_error);

}
?>