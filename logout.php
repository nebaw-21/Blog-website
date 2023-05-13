<?php 
session_start();
   unset($_SESSION['id']);
   unset($_SESSION['username']);
   unset($_SESSION['admin']);
   unset($_SESSION['type']);
   unset($_SESSION['message']);
session_destroy();

header('location: ../Blog/index.php');




?>