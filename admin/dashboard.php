<?php
 include('C:/xampp/htdocs/Blog/app/controllers/post.php');

 adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_section_Dashboard</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="../asset/css/style.css">

    <link rel="stylesheet" href="../asset/css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
<!-- admin header -->
<?php include("C:/xampp/htdocs/Blog/app/include/adminHeader2.php"); ?>

 <!-- Admin page wrapper-->
<div class="admin-wrapper">

<!--left side bar-->
<?php include("C:/xampp/htdocs/Blog/app/include/adminSideBar2.php"); ?>
<!--left side bar-->


<!--admin content-->
<div class="admin-content">

 
<div class="content">
    <h2 class="page-title">Dashboard page</h2>


</div>

</div>

<!--admin content-->

</div>
 <!-- Admin page wrapper-->
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 
 <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
 
 
 <script src="../asset/js/script.js"></script>

</body>
</html>