<?php
$host = 'localhost:3307';
$user = 'neba';
$password = '1234';
$db_name = 'blog';

$conn = new mysqli($host , $user , $password, $db_name);

if($conn->connect_error){
    die('Database connection error:'. $conn->connect_error);

}
?>