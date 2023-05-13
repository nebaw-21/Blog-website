<?php
 include('C:/xampp/htdocs/Blog/app/controllers/post.php');
 include("C:/xampp/htdocs/Blog/app/include/middleware.php"); 
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
    <a href="create.php" class="btn btn-big">Add post</a>
    <a href="index2.php" class="btn">Edit post</a>
</div>
 
<div class="content">
    <h2 class="page-title">Edit posts</h2>
<form action="edit.php" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $id ?>">

<div>
    <label >title</label><br>
    <input name="title" type="text" class="text-input" value="<?php echo $title ?>">
    <span>*<?php echo  $title_err; ?></span> 
</div>

<div>
    <label >Body</label>
    <textarea name="body" id="x" ><?php echo $body ?></textarea>
    <span>*<?php echo  $body_err; ?></span> 
</div>

<div>
<label >Image</label><br>
    <input name="image" type="file" class="text-input">
    <span>*<?php echo  $image_err; ?></span> 
</div>


<label >topic</label>
<select name="topic_id" class="text-input">
    <option value="<?php echo $topic ?>"></option>
    <?php foreach($topics as $key => $topic): ?>

        <option value="<?php echo$topic['id'] ?>"><?php echo$topic['name'] ?></option>
    <?php endforeach; ?>   
    
</select>
<span>*<?php echo  $topic_err; ?></span> 

</div>

<div>
<label >
    <input name="published" type="checkbox" class="text-input" value="<?php echo $published ?>" >
   Publish  
</label>
</div>


<div><br><br>
    <button name="update_post" type="submit" class="btn">Update</button>
</div>


</form>

</div>

</div>

<!--admin content-->

</div>
 <!-- Admin page wrapper-->
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 
 <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
 
 
 <script src="../../asset/js/script.js"></script>

</body>
</html>