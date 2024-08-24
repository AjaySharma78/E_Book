<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn,sha1($_POST['password']));
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass' And status='active' ") or die('query failed');
   if(mysqli_num_rows($select_users) > 0){
      $row = mysqli_fetch_assoc($select_users);
      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:index.php');
      }
   }else{
     
      $message[] = 'Incorrect email or password!';
   }
}

if(isset($_GET['token'])){

   $token = $_GET['token'];
   mysqli_query($conn,"UPDATE users set status='active' where token='$token'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <!-- font awesome cdn link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
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
      <form id="login" method="post">
          <h3 style="text-align:center">LOG IN</h3>
          <div class="input-group">
            <input type="email" name="email" required ><label><i class="fa-solid fa-envelope"></i>&nbsp;E-mail</label>
          </div>
          <div class="input-group">
            <input type="password" id="passwod" name="password" required ><label><i class="fa-solid fa-lock"></i>&nbsp;Password</label>
          </div>
          <input type="submit"  name="submit" value="Login now">
          <p  style="text-align:center; margin-top:5px; ">Don't have an account? <a style="text-decoration:none;"href="register.php">Register Now.</a></p>
          <p  style="text-align:center; margin-top:-10px;">Forgot Your Password? <a style="text-decoration:none;"href="forgotpass.php">Click here.</a></p>
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

