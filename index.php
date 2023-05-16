<?php  include('C:/xampp/htdocs/Blog/app/controllers/topic.php');
$posts =array();
$postsTitle = 'Recent Post';
if(isset($_GET['topic_id'])){
    $posts = getTopicId($_GET['topic_id']);
    $postsTitle = 'You searched for under topic  '.  $_GET['name'];
}

elseif(isset($_POST['search-term'])){
    $postsTitle = 'You searched for  '.  $_POST['search-term'];
    $posts = searchPost($_POST['search-term']);
}else{
    $posts = getPublishedPost();
}

$topics = selectAll2('topics');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="asset/css/style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- include header part -->
<?php require_once("app/include/header.php");?>

<!-- page wrapper -->
<div class="page-wrapper">
    <div class="post-slider">
        

        <h1 class="slider-title">Trending Posts</h1>
        

        <div class="post-wrapper">

<!-- post section -->
 <?php foreach($posts as $post): ?>
        
    <div class="post">

<img src="<?php echo 'asset/image/'. $post['image']; ?> " alt="" class="slider-image">
<div class="post-info">
<h4><a href="single.php?title_id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a></h4>
<i class="fa fa-user"><?php echo $post['username'] ?></i>
&nbsp;
<i class="fa fa-calendar"><?php echo date('F j,Y', strtotime($post['created_at'])); ?></i>
</div>
     </div>

<?php endforeach; ?>
<!-- end of post section -->

 </div>
 </div>

</div>

<div class="content clearfix">
    <div class="main-content">
    <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

    <!--post one -->
<?php foreach($posts as $post): ?>

    <div class="post">
        <img src="<?php echo 'asset/image/'. $post['image']; ?>" alt="" class="post-image">
    <div class="post-preview">
        <h1><a href="single.php?title_id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?> </a></h1>
       <i class="fa fa-user"><?php echo $post['username'] ?></i>
        <br><br>
        <i class="fa calander"><?php echo date('F j,Y', strtotime($post['created_at'])); ?></i>
        <p class="preview-text"> <?php echo html_entity_decode(substr($post['body'],0,100).'...' ); ?></p>

    <a href="single.php?title_id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
    </div>
    </div>

<?php endforeach; ?>

    </div>

    <div class="sidebar">
<div class="section search">
    <h2 class="section-title">search</h2>
<form action="index.php" method="POST">

<input type="text" name="search-term" class="text-input" placeholder="search...">
</form>
</div>

<div class="section topics">
    <h2 class="section-title">Topics</h2>
    <ul>

        <?php foreach($topics as $key => $topic): ?>
    
            <li><a href="<?php echo 'index.php?topic_id='. $topic['id'] . '&name=' . $topic['name'] ?>"> <?php echo $topic['name'] ?></a> </li>
    
    <?php endforeach; ?>

    </ul>


</div>


    </div>
</div>

<!--start of footer part-->

<!-- include footer part -->
<?php include("app/include/footer.php"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script src="asset/js/script.js"></script>

</body>
</html>