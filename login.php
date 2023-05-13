
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!--font Awsome-->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- include header part -->
<?php include("app/include/header.php"); ?>

  <div class="auth-content">
    <form action="login.php" method="post" class="form">
    <h2 class="form-title">Login</h2>
    
    <div>
        <label for="">username</label><br>
        <input type="text" name="login_username" class="text-input">
        <span>*<?php echo $name_err; ?></span> 
    </div>
    
    <div>
        <label for="">password</label><br>
        <input type="password" name="login_password" class="text-input">
        <span>*<?php echo $password_err; ?></span> 
    </div>
    
    <div>
       <button type="submit" name="login-btn" class="btn btn-big">login</button>
    </div>
    <p>or <a href="register.php">sign up</a></p>
  
    </form>

    </div>
