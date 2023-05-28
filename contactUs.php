<?php
 include('C:/xampp/htdocs/Blog/app/controllers/topic.php');
 

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $to = "nebiyuzewge@gmail.com";
  $headers = "From: $email \r\n";
$headers .= "Reply-To: $email \r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8 \r\n";

  $email_body = "You have received a new message from $name.\n\n"."Here is the message:\n\n$message";

   mail($to,$email_body,$headers);

}
?>

<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title> Contact Us Form </title>
    <link rel="stylesheet" href="asset/css/style.css?v=2">
    <link rel="stylesheet" href="asset/css/contactUs.css?v=2">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>

    <!-- include header part -->
    
    <?php require_once("app/include/header.php");?>
<br><br>
    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">Addis Ababa, Tuludimtu</div>
         
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+251 989 5647 46</div>
            <div class="text-two">+251 345 6789 34</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">ajaibNews@gmail.com</div>
            <div class="text-two">nebiyuzewge@gmail.com</div>
            <div class="text-two">rebumatadele@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send us a message</div>
          <p>If you have any comment or any types of question related to my this website, you can send us message from here. It's our pleasure to help you.</p>
          
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
              <input name="submit" type="submit" value="Send Now" />
            
            </div>
          </form>
        </div>
      </div>
      
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.min.js" integrity="sha512-fYjSocDD6ctuQ1QGIo9+Nn9Oc4mfau2IiE8Ki1FyMV4OcESUt81FMqmhsZe9zWZ6g6NdczrEMAos1GlLLAipWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="asset/js/script.js"></script>  

    <?php include("app/include/footer.php"); ?>

  </body>
</html>
