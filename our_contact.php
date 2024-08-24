<section class="our_contact">
    <div class="stores">
    <?php 
            $select_subscriber = mysqli_query($conn, "SELECT * FROM `subscribe`") ;
            $number_of_subscriber = mysqli_num_rows( $select_subscriber);
         ?>
        <h1><i class="fa-solid fa-shop"></i>&nbsp;<?php echo $number_of_subscriber; ?></h1>
        <p>No of subscriber</p>
    </div>
    <div class="stores">
    <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user' and status='active'") ;
            $number_of_users = mysqli_num_rows($select_users);
         ?>
     
        <h1><i class="fa-solid fa-people-group"></i>&nbsp;<?php echo $number_of_users; ?></h1>
        <p>Our happy customers</p>
    </div>
    <div class="stores">
    <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            $number_of_products = mysqli_num_rows($select_products);
         ?>
        <h1><i class="fa-solid fa-book"></i>&nbsp;<?php echo $number_of_products ; ?></h1>
        <p>No of available books</p>
    </div>


</section>