<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- include header part -->
<?php include( "app/include/header.php"); ?>

<div class="auth-content">
<form action="register.php" method="POST" class="form">
<h2 class="form-title">Register</h2>


<div>
    <label for="">username</label><br>
    <input  type="text" name="username" class="text-input">
    <span>*<?php echo  $name_err; ?></span> 
</div>

<div>
    <label for="">Email</label><br>
    <input type="email" name="email" class="text-input">
    <span>*<?php echo  $email_err; ?></span> 
</div>


<div>
    <label for="">password</label><br>
    <input type="password" name="password" class="text-input"  >
    <span>*<?php echo $password_err; ?></span> 
</div>

<div>
    <label for="">password Confirmation</label><br>
    <input type="password" name="confirmPassword" class="text-input">
    <span>*<?php echo $password_err; ?></span> 
</div>

<div>
   <button type="submit" name="register-btn" class="btn btn-big">Register</button>
</div>
<p>or <a href="login.php">sign In</a></p>

</form>

</div>