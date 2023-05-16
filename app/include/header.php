 
<?php
 include('../Blog/app/controllers/users.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
<a class="logo"  href="<?php echo 'index.php' ?>">
    <h1 class="logo-text"><span>Neba</span>news</h1>
</a>

<i class="fa fa-bars menu-toggle"></i>

<ul class="nav">
    <li><a href="">Home</a></li>
    <li><a href="">About</a> </li>

 
    <?php if (isset( $_SESSION['id'])): ?>
        <li>
        <a href="#">
        <i class="fa fa-user"></i>
       <?php echo( $_SESSION['username']) ?>
        <i class="fa fa-chevron-down"></i>
        </a> 
        <ul class="un">
        <?php if($_SESSION['admin']): ?>
            <li><a href="../Blog/admin/dashboard.php">Dashboard</a></li>

        <?php endif; ?>
        <li><a href="<?php echo '../Blog/logout.php'?>" class="logout">logout</a></li>
        </ul>
          
        </li>
    
   <?php  else:?>
    
   <li><a href="../Blog/register.php">Sign up</a> </li>
    <li><a href="../Blog/login.php">login</a> </li>

<?php endif; ?>

</ul>
  </header>

</body>
</html>