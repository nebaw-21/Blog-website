<?php  @session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css?v=2">
</head>
<body>

<header>
<a class="logo" href="<?php echo '../../index.php' ?>">
    <h1 class="logo-text"><span>Ajaib</span>news</h1>
</a>

<i class="fa fa-bars menu-toggle"></i>

<ul class="nav">
  
<?php if(isset(  $_SESSION['id'])): ?>

    <li>
<a href="#">

<i class="fa fa-user"></i>
 <?php echo $_SESSION['username'] ?>
    <i class="fa fa-chevron-down"></i>
</a>
    
<ul class="un">
   
    <li><a href="<?php echo '../../logout.php' ?>" class="logout">logout</a></li>
</ul>
      
    </li>
<?php endif; ?>
</ul>
  </header>

    
</body>
</html>