<?php require('C:/xampp/htdocs/Blog/app/database/db2.php');
include('C:\xampp\htdocs\Blog\app\include\middleware.php');


    $relatedPosts = array();
    $comment_table = 'commet';
    $like_table = 'like_table';
    $view_table = 'view_count';

    $posts = selectAll2('post' , ['published' => 1]);

    if(isset($_REQUEST['topic_id'])){

        $topic_id = $_REQUEST['topic_id'];
        //dd2($topic_id);
    
        $relatedPosts = selectAll2('post' , ['published' => 1 , 'topic_id' =>   $topic_id ]);

        //dd2( $relatedPosts);
    }
    
    if(isset($_REQUEST['title_id'])){
        
        $post = selectOne2('post' , ['id'=> $_REQUEST['title_id']]);
     
        $_SESSION['body'] = $post['body'];
        $_SESSION['title'] = $post['title'];
        $_SESSION['post_id'] = $post['id'];


    $_POST['post_id'] = $_SESSION['post_id'];//for count views
    $view_count = selectOne2($view_table, ['post_id' => $_SESSION['post_id'] ]);

    //dd2($_POST);

if(empty($view_count['id']) ){
    
    $_POST['NumberOfViews'] = 1;//for count views
    $view_id  = create2($view_table, $_POST);

}else{

    $NumberOfViews =  $view_count['NumberOfViews'] + 1 ;
    $_POST['NumberOfViews'] = $NumberOfViews ;
    $id = $view_count['id'];
    $update_id  = update2($view_table, $id ,  $_POST);
    //dd2($NumberOfViews);
   
}
       
     
}
$comment_posts = getUserNameForComment($_SESSION['post_id'] );
//dd2($comment_posts);

if(isset($_POST['comment_button'])){
    userOnly();
    $_REQUEST['post_id'] = $_SESSION['post_id'];
    $_REQUEST['user_id'] = $_SESSION['id'];//from login user
    $topic_id=$_REQUEST['topic_id'];

    unset($_REQUEST['topic_id']);
    unset($_REQUEST['comment_button']);
  
    if(!empty($_POST['comment_section'])){
     
       
            $comment_id  = create2($comment_table , $_REQUEST);
            header('Location: single.php?topic_id='. $topic_id
        
); 
    
        }else{
            header('Location: index.php');
        }
}


if(isset($_POST['like_button'])){
    userOnly();
    $_POST['user_id'] = $_SESSION['id'];//from login user
    $_POST['post_id'] = $_SESSION['post_id'];
 
    unset($_POST['like_button']);
    unset($_POST['topic_id']);

    $like_already = selectOne2($like_table, ['user_id' =>   $_POST['user_id'] , 'post_id' => $_POST['post_id'] ]);
    $like_already2 = selectOne2($like_table, ['post_id' =>   $_POST['post_id']]);

if(!isset($like_already)){
    
            $like_id  = create2($like_table , $_POST);
           
        }
          
    }


    @$number_of_likes = getNumberOfLikes($_SESSION['post_id']);
    @$number_of_views = getNumberOfViews($_SESSION['post_id']);
    @$number_of_comments = getNumberOfComments($_SESSION['post_id']);
    //dd2($number_of_views);


    
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
    <link rel="stylesheet" href="asset/css/style.css?v2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

    
      <form action="single.php" method="POST">
        
<input type="hidden" name="topic_id" value="<?php if(isset($_REQUEST['topic_id'])) echo $_REQUEST['topic_id'];else echo  $_POST['topic_id']  ?>">
      <input type="hidden" name="like_button"> 
      <i class="fa fa-eye">

        <?php foreach($number_of_views as $number_of_view): ?>
            <?php echo $number_of_view['NumberOfViews']?>
         
        <?php endforeach ?> &nbsp</i>

      <button  class="border-0" type="submit" name="like_button">  <i class="fa fa-thumbs-up">
        <?php foreach($number_of_likes as $number_of_like): ?>
            <?php echo $number_of_like['count'] ?>
         
        <?php endforeach ?>
        </i> </button>                          
      </form> 
    

        </div>
       </div>

    <!--sidebars-->
    <div class="sidebar single">

<div class="section popular">
    <h2 class="section-title">RELATED POSTE</h2>

<?php  foreach($relatedPosts as $relatedPos):?>
    <div class="post clearfix">
      
        <img src=" <?php echo 'asset/image/'. $relatedPos['image']; ?>" alt="">
        <a href="single.php?title_id=<?php echo $relatedPos['id'] .'&topic_id=' . $relatedPos['topic_id'] ;?>" class="title"><?php echo $relatedPos['title'] ?></a>
    </div>

<?php endforeach;?>


</div>

    </div>

      <!--end of sidebars-->

</div>



<form action="single.php" method="POST">
<input type="hidden" name="topic_id" value="<?php if(isset($_REQUEST['topic_id'])) echo $_REQUEST['topic_id'];else echo  $_POST['topic_id']  ?>">
<div class="d-flex flex-row add-comment-section mt-4 mb-4">
<input type="text" name="comment_section" placeholder="Add comment"  class="form-control mr-3" >
<button name="comment_button" type="submit" class= "btn btn-primary">COMMENT</button>
</div>
</form>



<!-- start of comment section  -->
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-comment">
                <h3 class="text-success"> <span class="mr-2 comments">
                <?php foreach($number_of_comments as $number_of_comment): ?>
               <?php echo $number_of_comment['count']?>
         
                 <?php endforeach ?>COMMENTS &nbsp;</span></h3>

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

<!--
   

    <li>most viseted posts</li>

    <li>make contact us functional</li>
    
 -->



<!--start of footer part-->
<?php include("app/include/footer.php"); ?>
<!-- include footer part -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="asset/js/script.js"></script>
</body>
</html>