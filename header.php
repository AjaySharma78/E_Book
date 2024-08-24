<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div id="message" class="messagees">
         <span>'.$message.'</span>
         <i class="fas fa-times"  onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<header>
   <div class="header">
      <div class="flex">
         <a href="home.php" class="logo">&#9775;ForU.</a>
         <div class="navbar_menu" id="navbar">Menu&#8628;</div>
         <section class="search-form">
                <form class="search-form-box" action="search_page.php" method="post">
                 <input type="text" name="search" placeholder="Find here...." class="box">
                 <input type="submit" name="submit" value="&#9740;" class="btn">
                </form>
            </section>
         <div class="icons"  >
            <div id="menu_btn" class="fas fa-bars"></div>
          
            <?php  if(isset($_SESSION['user_id'])){  
								 $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                           $cart_rows_number = mysqli_num_rows($select_cart_number); 
                            ?>
            <a href="cart.php" class="carti"> <i class="fas fa-shopping-cart"></i><span class="square"><span class="shopping-cart-no"><?php echo$cart_rows_number;?></span></span></a>
            <div id="user-btn" class="fas fa-user"  style="line-height:2.5"; ><span class="name"><?php echo $_SESSION['user_name']; ?></span><span class="user_arrow">&#10092;</span></div>
            <?php } else { ?>
               <a href="login.php" class="carti"> <i class="fas fa-shopping-cart"></i><span class="square"><span class="shopping-cart-no"></span></span></a>
            <div id="user-btn" class="fas fa-user"  style="line-height:2.5"; ><span class="name"></span><span class="user_arrow">&#10092;</span></div>
            <?php } ?>
         </div>
      </div>
   </div>
       <div class="navbar">
          <ul>
            <li>
               <a href="index.php">Home</a>
               <a href="about.php">About</a>   
               <a href="shop.php">Shop</a>
               <a href="contact.php">Contact</a>
               <a href="orders.php">Orders</a>
            </li>
          </ul>
       </div>
       <div class="user_infos">
          <div class="user_info">
             <div class="fa_user" style="display:none";>
               <p id="fa_user"><img src="user/Snapchat-1871921117.jpg" alt="" width="100px"></p>
             </div>
             <?php  if(isset($_SESSION['user_id']))
								{ ?>
               <p class="p">Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
               <p class="p">Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
               <a href="logout.php" class="delete-btn">Logout</a><?php } else{?>
                    <a href="login.php" class="delete-btn">Sign_In</a>
                    <a href="register.php" class="delete-btn">Sign_Up</a>
     
             <?php  }?>
             </div>
       </div>
</header>