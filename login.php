<?php 
//include header part 
include( "app/include/header.php"); 
gustOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<!-- include header part -->
<?php ?>

<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    LOGIN
                </div>
                <div class="col-lg-6 login-btm login-text">                
                                    <!-- Error Message -->
                                    <span><?php echo $password_err; ?></span>                    
                                    <span><?php echo  $name_err; ?></span> 
                                </div> 


                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                    <form action="login.php" method="POST">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="login_username" class="form-control" placeholder="USERNAME">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="login_password" class="form-control" i placeholder="PASSWORD">
                            </div>

                            <div class="col-lg-12 loginbttm">

                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" name="login-btn" class="btn btn-outline-primary">LOGIN</button>
                                    ...........
                                    <button class="btn btn-outline-primary"><a href="register.php">SIGN UP</a></button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="asset/js/script.js"></script>  
    
</body>
</html>




