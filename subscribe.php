
<?php

if(isset($_POST['submit'])){
$to_email = mysqli_real_escape_string($conn, $_POST['email']);
$subject = "suscribed";
$body = "Thanks for subscribing our store.Stay tuned for more update.Do not replay it...";
$headers = "From:Buymybooks135@gmail.com";
$select_users = mysqli_query($conn, "SELECT * FROM `subscribe` WHERE email = '$to_email'" );
if(mysqli_num_rows($select_users) > 0){
    ?> 
    <script>
     alert("you have suscribed");
     </script>
     <?php
}
else{
    mysqli_query($conn, "INSERT INTO `subscribe`(email) VALUES('$to_email ')") or die('query failed');
   if (mail($to_email, $subject, $body, $headers)) {
      ?> 
       <script>
       alert("suscribed");
       </script>
       <?php
}
 else {
    ?> 
   <script>
    alert("failed to send");
    </script>
    <?php }
}
}
?>
<section class="subscribe">
   <div class="sub_text">
    Subscribe our newsletter <br>
    for newest books updates.
   </div>
   <div class="sub_form">
    <form class="sub" action=""  method="post">
        <input class="sub_email" type="email" name="email" placeholder="Type your email here">
        <input class="sub_mit" type="submit" value="subscribe" name="submit">
    </form>
   </div>
</section>