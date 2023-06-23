<?php  
require('C:/xampp/htdocs/Blog/app/database/db2.php');



session_write_close();

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

$AllPosts = getPublishedPost3();
$topics = selectAll2('topics');

$MostViewedPosts = getMostNumberOfPublishedPost();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAIBNEWS</title>

  
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

<link rel="stylesheet" href="asset/css/style2.css">
<link rel="stylesheet" href="asset/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<!--font Awsome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- include header part -->
<?php require_once("app/include/header.php"); ?>


<?php include("app/include/message.php"); ?>

<!-- search part -->
<div class="search-container">
  <form action="index.php" method="POST">
    <input type="text" name="search-term" class="text-input" placeholder="Search...">
    <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
  </form>
</div>
<!-- end of search part -->


<!-- page wrapper -->
<div class="page-wrapper">
    <div class="post-slider">

        <h1 class="slider-title">Trending Posts</h1>
        
        <div class="post-wrapper">

<!-- post slide section -->

 <?php foreach($AllPosts as $AllPost): ?>
        
    <div class="post">

 <a href="single.php?title_id=<?php echo $AllPost['id'] .'&topic_id=' . $AllPost['topic_id'] ;?>"><img src="<?php echo 'asset/image/'. $AllPost['image']; ?> " alt="" class="slider-image"></a>  
<div class="post-info">
<h4><a href="single.php?title_id=<?php echo $AllPost['id'] .'&topic_id=' . $AllPost['topic_id'] ;?>"><?php echo $AllPost['title'] ?></a></h4>
<i class="fa fa-user"><?php echo $AllPost['username'] ?></i>
&nbsp;
<i class="fa fa-calendar"><?php echo date('F j,Y', strtotime($AllPost['created_at'])); ?></i>
</div>
     </div>

<?php endforeach; ?>
<!-- end of post slide section -->

 </div>

 </div>
</div>


	<div class="col-lg-12 col-md-12 text-center">
					<h1 id="fh5co-logo"><a href="index.html"><?php echo $postsTitle ?></a></h1>
		</div>


<br><br><br><br>

<div class="container-fluid">
<div class="row fh5co-post-entry">


<?php foreach($posts as $post): ?>
<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
  <figure>

    <a href="single.php?title_id=<?php echo $post['id'] .'&topic_id=' . $post['topic_id'] ;?>"><img src="<?php echo 'asset/image/'. $post['image']; ?>" alt="Image" class="img-responsive"></a>
  </figure>
  <h1  class="fh5co-article-title"><a href="single.php?title_id=<?php echo $post['id'] .'&topic_id=' . $post['topic_id'] ;?>"><?php echo $post['title'] ?> </a></h1>
  <i class="fa fa-user "><?php echo $post['username'] ?></i>
  <br><br>
  
  <span class="fh5co-meta fh5co-date">  <i class="fa calender"><?php echo date('F j,Y', strtotime($post['created_at'])); ?></i></span>
</article>

<?php endforeach; ?>




<div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>

<div class="col-lg-12 col-md-12 text-center">
					<h1 id="fh5co-logo"><a href="index.html">Most Viewed Post</a></h1>
</div>

<?php foreach($MostViewedPosts as $MostViewedPost): ?>
<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
  <figure>
    <a href="single.php?title_id=<?php echo $MostViewedPost['id'] .'&topic_id=' . $MostViewedPost['topic_id'] ;?>"><img src="<?php echo 'asset/image/'. $MostViewedPost['image']; ?>" alt="Image" class="img-responsive"></a>
  </figure>
  
  <h1><a href="single.php?title_id=<?php echo $MostViewedPost['id'] .'&topic_id=' . $MostViewedPost['topic_id'] ;?>"><?php echo $MostViewedPost['title'] ?> </a></h1>
  <i class="fa fa-user"><?php echo $MostViewedPost['username'] ?></i>
  <span class="fh5co-meta fh5co-date"><?php echo date('F j,Y', strtotime($MostViewedPost['created_at'])); ?></span>
</article>

<?php endforeach; ?>


</div>
</div>

<div class="cookie-banner" style="">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>This website uses cookies to ensure you get the best experience on our website. </p>
        <button class="btn btn-primary" id="accept-cookies-btn">Accept Cookies</button>
      </div>
    </div>
  </div>
</div>


<!--start of footer part-->
<?php include("app/include/footer.php"); ?>

<!-- include footer part -->



<!-- js library-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- js library-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!-- js library-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <!-- main js-->
<script src="asset/js/script.js"></script>


<script>

  if ( getCookie('cookieSeen') == 'shown') {
    $(".cookie-banner").fadeOut();
    setCookie('cookieSeen','shown',25);
  }
 $("#accept-cookies-btn").click(function() {
   $(".cookie-banner").fadeOut();
    setCookie('cookieSeen','shown',25);
  });
console.log(getCookie('cookieSeen'));
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }

  }
  return "";
}

</script>

</body>
</html>

