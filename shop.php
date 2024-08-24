<?php
error_reporting(0);
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   
   if(isset($_POST['add_to_cart'])){
      $message[] = 'Create your account to continue!';
   }}else{
if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')");
      $message[] = 'product added to cart!';
   }
}
};
if(isset($_POST['submits'])){
$to_email = mysqli_real_escape_string($conn, $_POST['email']);
$subject = "suscribed";
$body = "Thanks for subscribing our store.Stay tuned for more update.Do not replay it...";
$headers = "From:Buymybooks135@gmail.com";
$select_users = mysqli_query($conn, "SELECT * FROM `subscribe` WHERE email = '$to_email'" );
if(mysqli_num_rows($select_users) > 0){
    $message[] = 'you have subscribed already';
}
else{ 
    mysqli_query($conn, "INSERT INTO `subscribe`(email) VALUES('$to_email ')");
   mail($to_email, $subject, $body, $headers);
   $message[] = 'Thanks for subscribing';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>  
      <?php include 'header.php'; ?>
      <div  class="heading">
   <h3>Books</h3>
   <p style="width:100%;height:2rem;line-height:1.5;color:white;font-size:1.2rem; background-image:linear-gradient(to right,rgb(165, 93, 232),white);">
         <a style="color:white;text-decoration:none;" href="home.php">Home</a> / Shop </p>
</div>

   <section class="products_shop">
      <div class="box-container_shop">
         <?php
            $select_products = mysqli_query($conn,"SELECT * FROM `products`");
            if(mysqli_num_rows($select_products)>0){
               while($fetch_products = mysqli_fetch_assoc($select_products)){
         ?>
        <form action="" method="post" class="product_box">
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
         <input type="number" min="1" max="20" name="product_quantity" value="1" class="qty">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="Add to cart" name="add_to_cart" class="btnss">
        </form>
         <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
      </div>
   </section>

      <?php include 'testimonials.php'?>
      <?php include 'our_contact.php'?>
      <?php include 'subscribe.php'?>
      <?php include 'footer.php'; ?>

<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>