<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, sha1($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, sha1($_POST['cpassword']));
   $user_type = $_POST['user_type'];
   $token = sha1(rand(5,7));
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' " );

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
        $insertquery = "INSERT INTO `users`(name, email, password, user_type, token, status) VALUES('$name', '$email', '$cpass', '$user_type' ,'$token', 'inactive')";
         $iquery = mysqli_query($conn, $insertquery);
        

         if($iquery){ 
          
            $subject = "Account activation";
            $body = "Hi, $name. Click here too activate your account http://localhost/project/login.php?token=$token";
            $headers = "From:Buymybooks135@gmail.com";
      
            if(mail($email, $subject, $body, $headers)){
               $message[] = 'Check Your Email';
            }
             else{ 
               $message[] = 'You have subscribed already';
         }
       
      }
     }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <!-- font awesome cdn link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="login_page">
<div class="messages">
   <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="reg_message">
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
   <form id="register" method="post" >
         <h3 style="text-align:center;">Register Now</h3>
          <div class="input-group">
            <input type="text" name="name" required><label><i class="fa-solid fa-user"></i>&nbsp;User ID</label>
          </div>
          <div class="input-group">
            <input type="email"name="email" required><label><i class="fa-solid fa-envelope"></i>&nbsp;E-mail</label>
          </div>
          <div class="input-group">
            <input type="password"name="password" required ><label><i class="fa-solid fa-lock"></i>&nbsp;Password</label>
          </div>
          <div class="input-group">
            <input type="password"name="cpassword"  required ><label><i class="fa-solid fa-lock"></i>&nbsp;C-Password</label>
          </div>
          <select class="register" style=" color:rgba(137, 43, 226, 0.713)" name="user_type" >
         <option  value="user">USER</option>
         <option value="admin">ADMIN</option>
         </select>
          <input type="submit"  name="submit" value="Register Now">
          <p  style="text-align:center; margin-top:20px; ">Already have an account? <a style="text-decoration:none;" href="login.php">Login Now</a></p>
          <p  style="margin-top:-12px;"class="logo">&#9775;ForU.</p>
        </form>
</div>
</div>
</div>
<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>



