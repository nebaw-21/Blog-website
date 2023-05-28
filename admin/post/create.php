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
    <title>Add topic</title>
 

    <link rel="stylesheet" href="../../asset/css/style.css">
    
    <link rel="stylesheet" href="../../asset/css/admin.css">
    
    <!--font Awsome-->
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
    <a href="index2.php" class="btn">Manage post</a>
</div>
 
<div class="content">
    <h2 class="page-title">Add posts</h2>


<form action="create.php" method="POST" enctype="multipart/form-data">
<div>
    <label >Title</label><br>
    <input name="title" type="text" class="text-input">
    <span>*<?php echo  $title_err; ?></span>  
</div>

<div>
    <label >Description</label>
    <textarea name="body" id="x"></textarea>
    <span>*<?php echo  $body_err; ?></span> 
</div>

<div>
<label >Image or video</label><br>
    <input name="image" type="file" class="text-input">
    <span>*<?php echo  $image_err; ?></span> 
</div>

<div><br>

<label >topic</label>
<select name="topic_id" class="text-input">
    <option value=""></option>
    <?php foreach($topics as $key => $topic): ?>

        <option value="<?php echo$topic['id'] ?>"><?php echo$topic['name'] ?></option>
    <?php endforeach; ?>   
    
</select>
<span>*<?php echo  $topic_err; ?></span> 

</div>


<div>
<label >
    
    <input name="published" type="checkbox" class="text-input">
   Publish  
</label>
</div>


<div><br><br>
    <button name="add_posts" type="submit" class="btn">Add post</button>
</div>


</form>

</div>

</div>

<!--admin content-->

</div>
 <!-- Admin page wrapper-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
 <script src="../../asset/js/script.js"></script>
 
 <script>
     CKEDITOR.replace( 'body' ); 
</script>

 

</body>
</html>