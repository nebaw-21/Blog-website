<?php
 include('C:/xampp/htdocs/Blog/app/controllers/topic.php');

 adminOnly();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add topic</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="../../asset/css/style.css">

    <link rel="stylesheet" href="../../asset/css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
<!-- admin header -->
<?php include("../../app/include/adminHeader.php"); ?>

 <!-- Admin page wrapper-->
<div class="admin-wrapper">

<!--left side bar-->
<?php include("../../app/include/adminSideBar.php"); ?>
<!--left side bar-->


<!--admin content-->
<div class="admin-content">
<div class="button-group">
    <a href="create.php" class="btn btn-big">Add topic</a>
    <a href="index2.php" class="btn">Manage topic</a>
</div>
 
<div class="content">
    <h2 class="page-title">Add topics</h2>


<form action="create.php" method="post">
<div>
    <label >Name</label><br>
    <input name="name" type="text" class="text-input">
    <span>*<?php echo  $name_err; ?></span> 
</div>

<div>
    <label >Description</label>
    <textarea name="Description" id="x"></textarea>
    <span>*<?php echo  $description_err; ?></span> 
</div>


<div><br><br>
    <button name="add_topic" type="submit" class="btn">Add topic</button>
</div>


</form>

</div>

</div>

<!--admin content-->

</div>
 <!-- Admin page wrapper-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
 <script>
     CKEDITOR.replace( 'Description' ); 
    </script>
 
     <script src="../../asset/js/script.js"></script>

</body>
</html>