<?php
error_reporting(0);
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   
   if(isset($_POST['send'])){

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $number = $_POST['number'];
      $msg = mysqli_real_escape_string($conn, $_POST['message']);
   
      $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
      if(mysqli_num_rows($select_message) > 0){
         $message[] = 'message sent already!';
      }else{
         mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
         $message[] = 'message sent successfully!';
      }
   
   }}else{

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
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
   <title>contact</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="heading" style="margin-top:2rem">
      <h3>Shopping cart</h3>
      <p
         style="width:100%;height:2rem;line-height:1.5;color:white;font-size:1.2rem; background-image:linear-gradient(to right,rgb(165, 93, 232),white);">
         <a style="color:white;text-decoration:none;" href="home.php">Home</a> / Contact </p>
   </div>
<section class="contact">
   <form action=""  method="post">
      <h3>say something!</h3>
      <div  class="input-group"><input style="border-radius:5px;" type="text" name="name" required placeholder="Enter your name"></div>
      <div class="input-group"><input style="border-radius:5px;" type="email" name="email" required placeholder="Enter your email"></div>
      <div class="input-group"><input style="border-radius:5px;" type="number" name="number" required placeholder="Enter your number"></div>
      <div class="input-group"><textarea style="border:1px solid blueviolet;border-radius:5px;padding-left: 10px;width:330px;"name="message"  placeholder="Enter your message" id="" cols="" rows="5"></textarea></div>
      <input type="submit" style="margin-left:1.3rem;" class="delete-btn "value="send message" name="send">
   </form>
</section>
<?php include 'our_contact.php'?>
      <?php include 'subscribe.php'?>
<?php include 'footer.php'; ?>
<!-- custom js file link  -->
<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>