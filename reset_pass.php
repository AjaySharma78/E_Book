<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
 
   if(isset($_GET['token'])){
   $token = $_GET['token'];

   $pass = mysqli_real_escape_string($conn, sha1($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, sha1($_POST['cpassword']));
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $select_users = mysqli_query($conn, "UPDATE `users` set  password='$cpass' where token='$token'" );
       if($select_users){
         $message[] = 'Your password has been updated'; 
         header('location:login.php');
       }else{
       $message[] = 'Your password is not updated';
       header('location:reset_pass.php');
      }
   }
}
else{
   $message[] = 'Confirm password not matched!';
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
<body >
<div id="login_page">
<div class="messages">
   <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
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
   <form id="reset_pass" method="post" >
         <h3 style="text-align:center;">Reset Password</h3>
          <div class="input-group">
            <input type="password"name="password" required ><label><i class="fa-solid fa-lock"></i>&nbsp;Password</label>
          </div>
          <div class="input-group">
            <input type="password"name="cpassword"  required ><label><i class="fa-solid fa-lock"></i>&nbsp;C-Password</label>
          </div>
          <input type="submit" name="submit" value="Update password">
          <p  style="text-align:center; margin-top:20px; ">Already have an account? <a style="text-decoration:none;" href="login.php">Login Now</a></p>
          <p  style="margin-top:-5px;"class="logo">&#9775;ForU.</p>
        </form>
</div>
</div>
</div>
<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>



