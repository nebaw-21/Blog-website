<?php
//include header part 
include( "app/include/header.php"); 
userOnly();//this page accessed by only users

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['submit'])) {

// initializing variables

$errors = array(); 
$email  =$_POST['email'];
$username=$_POST['name'];
$message = $_POST['message'];
   
$mail = new PHPMailer(true);
header('location:index.php');

try {
      //Server settings
 $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
 $mail->isSMTP();                        // Send using SMTP
 $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
$mail->SMTPAuth   = true;                // Enable SMTP authentication
 $mail->Username   = 'nebiyuzewge@gmail.com'; // SMTP username
  $mail->Password   = 'vknqqhbqhsvoknys';    // SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 465;                          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $email1='nebiyuzewge@gmail.com';
      $mail->setFrom( $email1, 'customer');
      $mail->addAddress($email1, $username);     // Add a recipient
      $mail->addAddress($email1);               // Name is optional
     // $mail->addReplyTo('adamweiss651@gmail.com', 'Information');
     // $mail->addCC('cc@example.com');
     // $mail->addBCC('bcc@example.com');
  
      // Attachments
     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'customer message ' .$email.' ';
      $mail->Body    = $message;
      $mail->AltBody = $message;
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

 
  }
  ?>

<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title> Contact Us Form </title>
    <link rel="stylesheet" href="asset/css/style.css?v=2">
    <link rel="stylesheet" href="asset/css/contactUs.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>

    <!-- include header part -->
 
<br><br>
    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fa fa-map-marker-alt custom-icon "></i>
            <div class="topic">Address</div>
            <div class="text-one">Addis Ababa, Tuludimtu</div>
         
          </div>
          <div class="phone details">
            <i class="fa fa-phone-alt custom-icon "></i>
            <div class="topic">Phone</div>
            <div class="text-one">+251 989 5647 46</div>
            <div class="text-two">+251 345 6789 34</div>
          </div>
          <div class="email details">
            <i class="fa fa-envelope custom-icon "></i>
            <div class="topic">Email</div>
            <div class="text-one">ajaibNews@gmail.com</div>
            <div class="text-two">nebiyuzewge@gmail.com</div>
            <div class="text-two">rebumatadele@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send us a message</div>
        
          <form action="contactUs.php" method="POST">


            <div class="input-box">
              <input type="text" name="name" placeholder="Enter your name "  required/>
            </div>
            <div class="input-box">
              <input type="text" name="email" placeholder="Enter your email" required />
            </div>
            <div class="input-box message-box">
              <textarea name="message" placeholder="Enter your message" required></textarea>
            </div>
            <div class="button">
              <input class="submit_button" name="submit" type="submit" value="Send Now" />
            
            </div>
          </form>
        </div>
      </div>
      
    </div>

    <!-- js library-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- main js-->
    <script src="asset/js/script.js"></script>  

    <!-- footer part-->
    <?php include("app/include/footer.php"); ?>

  </body>
</html>
