<?php  include('C:/xampp/htdocs/Blog/app/controllers/post.php'); 
    $comment_table = 'commet';
    $posts = selectAll2('post' , ['published' => 1]);
    
    if(isset($_GET['title_id'])){
        
        $post = selectOne2('post' , ['id'=> $_GET['title_id']]);
        $_SESSION['body'] = $post['body'];
        $_SESSION['title'] = $post['title'];
        $_SESSION['post_id'] = $post['id'];
     
}
$comment_posts = getUserNameForComment($_SESSION['post_id'] );
//dd2($comment_posts);

if(isset($_POST['comment_button'])){

    $_POST['post_id'] = $_SESSION['post_id'];
    $_POST['user_id'] = $_SESSION['id'];//from login user
    unset($_POST['comment_button']);
  
    if(!empty($_POST['comment_section'])){
        
       
            $comment_id  = create2($comment_table , $_POST);
            header('Location: single.php'); 
    
        }else{
            header('Location: index.php');
        }
    
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single page</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="asset/css/comment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css?v2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

      <!--navigation bar-->
      
<!-- include header part -->
<?php include( "app/include/header.php"); ?>

  <!--end of navigation bar-->

<div class="page-wrapper">
   
<div class="content clearfix">
    <div class="main-content single">
   <h1 class="post-title"><?php echo $_SESSION['title'] ?></h1>
   <div class="post-content">
    <p><?php echo html_entity_decode($_SESSION['body']) ?></p>
                                       
        </div>
       </div>

    <!--sidebars-->
    <div class="sidebar single">

<div class="section popular">
    <h2 class="section-title">related post</h2>
<?php  foreach($posts as $p):?>
    <div class="post clearfix">
        <img src=" <?php echo 'asset/image/'. $p['image']; ?>" alt="">
        <a href="#" class="title"><?php echo $p['title'] ?></a>
    </div>

<?php endforeach;?>


</div>

    </div>

      <!--end of sidebars-->
</div>


<form action="single.php" method="POST">

<input type="text" name="comment_section" placeholder="comment if you want">
<button name="comment_button">SEND</button>


</form>

<!-- start of comment section  -->
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-comment">
                <h3 class="text-success">Comments</h3>

                <?php foreach( $comment_posts as  $comment_post): ?>
                <hr/>
                    <ul class="comments">
                    <li class="clearfix">
                    <i class="fa fa-user" class="avatar"></i>
    
                      <div class="post-comments">
                          <p class="meta"><?php echo date('F j,Y', strtotime($comment_post['created_at'])); ?>  <a href="#"><?php echo $comment_post['username'] ?></a> says : <i class="pull-right"></i></p>
                          <p>
                          <?php echo $comment_post['comment_section'] ?>
                          </p>
                      </div>
                    </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>  
<!-- end of comment section  -->




<!--<div>
    <p>some functionality that will be included in this project!</p>
<ul>
    <li>comment, like and share</li>
    <li>how many user are look the post</li>
    <li>most viseted posts</li>
    <li>add video</li>
    <li>related post</li>
    <li>make contact us functional</li>
    <li>finish the project within 10 days.  5/30/2023</li>

</ul>

</div> -->



<!--start of footer part-->

<?php include("app/include/footer.php"); ?>
<!-- include footer part -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="asset/js/script.js"></script>
</body>
</html>