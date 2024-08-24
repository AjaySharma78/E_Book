<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}
if(isset($_POST['submits'])){
   $to_email = mysqli_real_escape_string($conn, $_POST['email']);
   $subject = "suscribed";
   $body = "Thanks for subscribing our store.Stay tuned for more update. ";
   $headers = "From:ajaykumarraj834@gmail.com";
   $select_users = mysqli_query($conn, "SELECT * FROM `subscribe` WHERE email = '$to_email'" );
   if(mysqli_num_rows($select_users) > 0){
       $message[] = 'you have subscribed already';
   }
   else{ 
       mysqli_query($conn, "INSERT INTO `subscribe`(email) VALUES('$to_email ')") or die('query failed');
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <?php include 'header.php'; ?>
   <div class="heading" style="margin-top:2rem">
      <h3>Shopping cart</h3>
      <p style="width:100%;height:2rem;line-height:1.5;color:white;font-size:1.2rem; background-image:linear-gradient(to right,rgb(165, 93, 232),white);">
         <a style="color:white;text-decoration:none;" href="home.php">Home</a> / cart </p>
   </div>
   <div class="box-container-cart ">
      <table cellpadding="0" cellspacing="0">
         <tr>
            <th colspan=2>Items</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
            <th></th>
         </tr>
         <?php
            $grand_total = 0;
            $gran = 0;
            $final = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
               while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>
         <tr>
            <td style="text-align:center;"><img  class="image"src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt=""></td>
            <td  class="cart_rows"><?php echo $fetch_cart['name']; ?></td>
            <td class="cart_rowss">
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity"
                     value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" style="background:transparent;border:none;" name="update_cart" value="&#8634;">
               </form>
            </td>
            <td class="cart_row">$<?php echo $fetch_cart['price']; ?>/-</td>
            <td class="cart_row">$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</td>
            <td class="cart_row"> <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>"class="fa-solid fa-trash" style="color:gray;padding-right:20px;"onclick="return confirm('delete this from cart?');"></a></td>
           </tr>
         </tr>
         <?php
         $grand_total += $sub_total;
         $gran = $grand_total * 13/100 ;
         $final =  $gran +  $grand_total ;
            }
         }else{
            echo '<p class="empty">your cart is empty</p>';
         }
         ?>
      </table>
   </div>
   <div class="cart-total">
        <div class="cart-width">
           <div  class="cart-check">
            <h3>Shopping Summary</h3>
            <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis iusto doloremque enim possimus eum porro recusandae minus obcaecati repellendus debitis.</p>
           </div>
                 <div class="cart_checkout">
                  <table>
                     <tr>
                        <td>Subtotal :</td>
                        <td class="p_cart">$<?php echo  $grand_total; ?>/-</td>
                     </tr>
                     <tr>
                        <td> Tax-13% :</td>
                        <td class="p_cart">$<?php echo $gran; ?>/-</td>
                     </tr>
                    
                     <tr >
                        <td>Grand total :</td>
                        <td class="p_cart">$<?php echo  $final ; ?>/-</td>
                     </tr>
                  </table>
              
                  <div class="checkout_btn">
                     <a href="checkout.php" class="checkout <?php echo ($grand_total > 1)?'':'disabled'; ?>">Checkout</a>
                     <br>
                     <a href="shop.php" class="option-btn">Continue shopping</a>
                  </div>
                 </div>
        </div>
   </div>

   </section>
   <?php include 'subscribe.php'?>
   <?php include 'footer.php'; ?>
   <script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
   <!-- custom js file link  -->
   <script src="js/script.js"></script>
</body>

</html>