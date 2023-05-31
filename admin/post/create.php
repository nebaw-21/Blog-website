<?php
 include('C:/xampp/htdocs/Blog/app/controllers/post.php');
 adminOnly();//this page accessed by only admins
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add topic</title>
     
       <!--main css style-->
    <link rel="stylesheet" href="../../asset/css/style.css">

       <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!--admin css style-->
    <link rel="stylesheet" href="../../asset/css/admin.css">

    <!--font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!-- admin header -->
<?php include("../../app/include/adminHeader.php"); ?>
<!-- end of  admin header -->

 <!-- Admin page wrapper-->
<div class="admin-wrapper">

<!--left side bar-->
<?php include("../../app/include/adminSideBar.php"); ?>
<!--left side bar-->

<!--admin content-->
<div class="admin-content">
<div class="button-group">
    <a href="create.php" class="btn btn-primary">Add post</a>
    <a href="index2.php" class="btn btn-primary">Manage post</a>
</div>
 
<div class="content">
    <h2 class="h  text-center text-primary  font-weight-bold">Add posts</h2>


 <!-- form  -->

<form action="create.php" method="POST" enctype="multipart/form-data">
<div>
    <label class=" h3 text-primary font-weight-bold" >Title</label><br>
    <input name="title" type="text" class="text-input">
    <span>*<?php echo  $title_err; ?></span>  
</div>

<div>
    <label  class=" h3 text-primary font-weight-bold" >Description</label>
    <textarea name="body" id="x"></textarea>
    <span>*<?php echo  $body_err; ?></span> 
</div>

<div class="custom-file">
<label class="custom-file-label  h3 text-primary font-weight-bold" for="customFile" >Image</label><br>
    <input name="image" type="file" class="custom-file-input" id="customFile">
    <span>*<?php echo  $image_err; ?></span> 
</div>

<div><br>

<label  class=" h3 text-primary font-weight-bold"  >topic</label><br>
<select name="topic_id" class="text-input">
    <option value=""></option>
    <?php foreach($topics as $key => $topic): ?>

        <option value="<?php echo$topic['id'] ?>"><?php echo$topic['name'] ?></option>
    <?php endforeach; ?>   
    
</select>
<span>*<?php echo  $topic_err; ?></span> 

</div>

<div>
<label  class=" h4 text-primary font-weight-bold" >
    <input name="published" type="checkbox" class="btn">
   Publish  
</label>

</div>

<div>
    <button name="add_posts" type="submit" class="btn btn-success">Add post</button>
</div>

</form>

 <!-- End of form  -->

     </div>

  </div>

<!--admin content-->
</div>

 <!-- End of Admin page wrapper-->

 <!--  js library  -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- CDK editor js  -->
 <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

 <!-- main js  -->
 <script src="../../asset/js/script.js"></script>
 
 <script>
     CKEDITOR.replace( 'body' );//CDK Editor js plugin;
</script>
</body>
</html>