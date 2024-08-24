<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading" style="margin-top:2rem">
      <h3>Shopping cart</h3>
      <p style="width:100%;height:2rem;line-height:1.5;color:white;font-size:1.2rem; background-image:linear-gradient(to right,rgb(165, 93, 232),white);">
         <a style="color:white;text-decoration:none;" href="home.php">Home</a> / About </p>
   </div>

<section class="about">
   <div class="flex">
      <div  style="position: relative;"   class="image">
         <img src="images/book_reg.jpg" width=100%; alt="">
         <div  class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatibus aut hic molestias, reiciendis natus fuga, cumque excepturi veniam ratione iure. Excepturi fugiat placeat iusto facere id officia assumenda temporibus?</p>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatibus aut hic molestias, reiciendis natus fuga, cumque excepturi veniam ratione iure. Excepturi fugiat placeat iusto facere id officia assumenda temporibus?</p>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
         <a href="contact.php" style="color:white;padding:5px;"class="btnss">Contact us</a>
      </div>
      </div>
   </div>
</section>

<!-- 
<h3 style="text-align:center;margin-top:2rem;">Review</h3>
<section class="h_monials">
    <div class="testimonials">
        <div class="text_monials">
              <div class="rating_star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half"></i>
              </div>
              <p>Shopping book in ForU is very easy.Quick delivery and fast respon.The service is awesome.</p>
              <div class="monials_details">
                  <div class="names_monials">
                    <h3>Ajay&nbsp;sharma</h3>
                    <p>book lovers</p>
                  </div>
                  <img src="images\author-1.jpg" alt="" width="40px">
              </div>
        </div>
        <div class="text_monials">
              <div class="rating_star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              </div>
              <p>Shopping book in ForU is very easy.Quick delivery and fast respon.The service is awesome.</p>
              <div class="monials_details">
                  <div class="names_monials">
                  <h3>Ajay&nbsp;sharma</h3>
                    <p>book lovers</p>
                  </div>
                  <img src="images\author-1.jpg" alt="" width="40px">
              </div>
        </div>
        <div class="text_monials">
              <div class="rating_star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              </div>
              <p>Shopping book in ForU is very easy.Quick delivery and fast respon.The service is awesome.</p>
              <div class="monials_details">
                  <div class="names_monials">
                  <h3>Ajay&nbsp;sharma</h3>
                    <p>book lovers</p>
                  </div>
                  <img src="images\author-1.jpg" alt="" width="40px">
              </div>
        </div>
        <div class="text_monials">
              <div class="rating_star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              </div>
              <p>Shopping book in ForU is very easy.Quick delivery and fast respon.The service is awesome.</p>
              <div class="monials_details">
                  <div class="names_monials">
                  <h3>Ajay&nbsp;sharma</h3>
                    <p>book lovers</p>
                  </div>
                  <img src="images\author-1.jpg" alt="" width="40px">
              </div>
        </div>
        <div class="text_monials">
              <div class="rating_star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              </div>
              <p>Shopping book in ForU is very easy.Quick delivery and fast respon.The service is awesome.</p>
              <div class="monials_details">
                  <div class="names_monials">
                  <h3>Ajay&nbsp;sharma</h3>
                    <p>book lovers</p>
                  </div>
                  <img src="images\author-1.jpg" alt="" width="40px">
              </div>
        </div>
        <div class="text_monials">
              <div class="rating_star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              </div>
              <p>Shopping book in ForU is very easy.Quick delivery and fast respon.The service is awesome.</p>
              <div class="monials_details">
                  <div class="names_monials">
                  <h3>Ajay&nbsp;sharma</h3>
                    <p>book lovers</p>
                  </div>
                  <img src="images\author-1.jpg" alt="" width="40px">
              </div>
        </div>
        <div class="text_monials">
              <div class="rating_star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              <i class="fa-regular fa-star" style="color:grey;"></i>
              </div>
              <p>Shopping book in ForU is very easy.Quick delivery and fast respon.The service is awesome.</p>
              <div class="monials_details">
                  <div class="names_monials">
                  <h3>Ajay&nbsp;sharma</h3>
                    <p>book lovers</p>
                  </div>
                  <img src="images\author-1.jpg" alt="" width="40px">
              </div>
        </div>
    </div>
</section>

<h1 style="text-align:center;"class="title">Greate authors</h1>
<section class="h_monials">
   <div class="testimonials">
      <div  class="text_monials">
         <img style="padding-top:5px;border-radius:20px;"src="images/author-1.jpg" width=50px; alt="">
         <div class="rating_star">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>John deo</h3>
      </div>

      <div class="text_monials">
      <img style="padding-top:5px;border-radius:20px;"src="images/author-1.jpg" width=50px; alt="">
         <div class="rating_star">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>John deo</h3>
      </div>

      <div class="text_monials">
      <img style="padding-top:5px;border-radius:20px;"src="images/author-1.jpg" width=50px; alt="">
         <div class="rating_star">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>John deo</h3>
      </div>

      <div class="text_monials">
      <img style="padding-top:5px;border-radius:20px;"src="images/author-1.jpg" width=50px; alt="">
         <div class="rating_star">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>John deo</h3>
      </div>

      <div class="text_monials">
      <img style="padding-top:5px;border-radius:20px;"src="images/author-1.jpg" width=50px; alt="">
         <div class="rating_star">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>John deo</h3>
      </div>

      <div class="text_monials">
      <img style="padding-top:5px;border-radius:20px;"src="images/author-1.jpg" width=50px; alt="">
         <div class="rating_star">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>John deo</h3>
      </div>
   </div> 

</section> -->
<?php include 'our_contact.php'?>
<?php include 'subscribe.php'?>
<?php include 'footer.php'; ?>
<!-- cdn -->
<script src="https://kit.fontawesome.com/9af0d3dd7d.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5ee22cfab6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>