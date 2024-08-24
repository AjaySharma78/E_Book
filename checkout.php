<?php
include 'config.php';
require('stripeconfig.php');
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_POST['order_btn'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');
   $cart_total = 0;
   $cart_products[] = '';
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }
   $total_products = implode(', ',$cart_products);
   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');
   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
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
   <title>checkout</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="heading" style="margin-top:2rem">
      <h3>Shopping cart</h3>
      <p style="width:100%;height:2rem;line-height:1.5;color:white;font-size:1.2rem; background-image:linear-gradient(to right,rgb(165, 93, 232),white);">
         <a style="color:white;text-decoration:none;" href="home.php">Home</a> / Checkout </p>
   </div>
<section class="checkout">
   <section style="width:300px; text-align:center; background-image:linear-gradient(to right,rgb(160, 120, 211),white); border-radius:6px;" class="display-order">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
               $grand_total += $total_price;
      ?>
      <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
      <div class="grand-total"> Grand total : <span>$<?php echo $grand_total; ?>/-</span> </div>
   </section>
   <section class="contacts">
      <form action="" method="post">
         <h3>Place your order</h3>
         <div class="contacts">
            <div class="input-groupss">
               <input type="text" name="name" required placeholder="Enter your name">
            </div>
            <div class="input-groupss">
               <input type="number" name="number" required placeholder="Enter your number">
            </div>
            <div class="input-groupss">
               <input type="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="input-groupss">
               <select  class="center" name="method">
                  <option value="cash on delivery">Cash on delivery</option>
                  <option value="credit card">Credit card</option>
                  <option value="paypal">Paypal</option>
                  <option value="paytm">Stripe</option>
               </select>
            </div>
            <div class="input-groupss">
               <input type="number" min="0" name="flat" required placeholder="e.g. Flat no.">
            </div>
            <div class="input-groupss">
               <input type="text" name="street" required placeholder="e.g. Street name">
            </div>
            <div class="input-groupss">
               <input type="text" name="city" required placeholder="e.g. KATHMANDU">
            </div>
            <div class="input-groupss">
               <input type="text" name="state" required placeholder="e.g. POV.2">
            </div>
            <div class="input-groupss">
               <input type="text" name="country" required placeholder="e.g. NEPAL">
            </div>
            <div class="input-groupss">
               <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
            </div>

         </div>
         <input type="submit" value="Order now" class="btnss" name="order_btn">
      </form>
      <form id="stripe-form" action="process_payment.php" method="post" >

               <input type="hidden" name="grand_total" value="<?php echo  $grand_total; ?>">
               <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                       data-key="<?php echo $publishableKey ?>"
                       data-amount="<?php echo $grand_total * 100; ?>"
                       data-name="O.F.O.S"
                       data-image="https://th.bing.com/th/id/OIP.CpgvtjCNvRvlk0jub0l4nQAAAA?rs=1&pid=ImgDetMain"
                       data-currency="inr"
                       data-email="kalakafle456789@gmail.com"
                       data-description='Please provide your card details.'>
               </script>
            </form>
   </section>
</section>
<?php include 'footer.php'; ?>
<!-- custom js file link  -->
<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="js/script.js">
<script>



</script>
</body>
</html> 