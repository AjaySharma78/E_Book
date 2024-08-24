<?php
include 'config.php';
if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'" );

   if(mysqli_num_rows($select_users) > 0){
          $userdata = mysqli_fetch_assoc($select_users );
 

          $name = $userdata['name'];
          $token = $userdata['token'];
            $subject = "Password Reset";
            $body = "Hi, $name. Click here too reset your password http://localhost/project/reset_pass.php?token=$token";
            $headers = "From:Buymybooks135@gmail.com";
      
            if(mail($email, $subject, $body, $headers)){
               $message[] = 'Check Your Email to reset your password';
            }
             else{ 
               $message[] = 'No user found';
         }
        }
       else{
        $message[] = 'No user found';
       }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="login_page">
<div class="messages">
   <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="for_message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
}
}
?>
</div>
<div class="login_page">
<div class="login-form-container">
      <form id="for_pass" method="post">
          <h3 style="text-align:center">Recover your Account</h3>
          <div class="input-group">
            <input type="email" name="email" required ><label><i class="fa-solid fa-envelope"></i>&nbsp;E-mail</label>
          </div>
          <input type="submit"  name="submit" value="Send Mail">
          <p  style="text-align:center; margin-top:10px; ">Have an account? <a style="text-decoration:none;"href="login.php">Log in</a></p>
          <p  style="margin-top:-5px;"class="logo">&#9775;ForU.</p>
      </form>
</div>
</div>
</div>
<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>