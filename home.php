<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}
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
   <title>home</title>
   <!-- bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body onload="my()">
<div id="loading"></div>
<!-- header -->
<?php include 'header.php'; ?>
<!-- section -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images\pexels-pixabay-256455.jpg" class="d-block w-100" alt="...">
      <div class="cover">
         <div class="word">
            <h2>Find over a million book in <span class="topic">ForU.</span> </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, at sed rerum iusto sapiente earum quae consequatur eum sequi voluptates.</p>
            <a href="shop.php">Go to collection &emsp; &#8594;</a>
         </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images\pexels-cottonbro-studio-4866043.jpg" class="d-block w-100" alt="...">
      <div class="cover">
         <div class="word">
         <h2>Welcome to <span class="topic">ForU.</span> Online Book Store</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, at sed rerum iusto sapiente earum quae consequatur eum sequi voluptates.</p>
            <a href="shop.phpw">Go to collection &emsp; &#8594;</a>
         </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images\pexels-abby-chung-1106468.jpg" class="d-block w-100" alt="...">
      <div class="cover">
         <div class="words">
         <h2>Welcome to <span class="topic">ForU.</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, at sed rerum iusto sapiente earum quae consequatur eum sequi voluptates.</p>
         </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<h1 class="title">Trending products</h1>
<!-- book -->
<section class="products">
      <div class="trending">
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 5") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_products = mysqli_fetch_assoc($select_products)){
         ?>
        <form action="" method="post" class="product_box">
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price" style="margin-left: 20px;">$<?php echo $fetch_products['price']; ?>/-</div>
         <input type="number" min="1" name="product_quantity" value="1" class="qty">
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
   <?php include 'our_features.php'; ?>
<h1 class="title">latest products</h1>
<!-- book -->
   <section class="products">
      <div class="box-container">
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 20") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_products = mysqli_fetch_assoc($select_products)){
         ?>
        <form action="" method="post" class="product_box">
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
         <input type="number" min="1" name="product_quantity" value="1" class="qty">
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
        <div class="load-more" style="margin-top:0rem; text-align:center">
         <a href="shop.php" class="option-btn">Load More &#8594;</a>
        </div>
        <!-- testimonial -->
        <?php include 'testimonials.php'?>
        <!-- contact -->
        <?php include 'our_contact.php'?>
        <!-- subscribe -->
        <?php include 'subscribe.php'?>
        <!-- footer -->
        <?php include 'footer.php'; ?>
<!-- custom js file link  -->
<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="js/script.js">
</script>
</body>
</html>