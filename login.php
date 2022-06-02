
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="index.html" class="logo"> <img src="img/logo.png" alt=""></i>  </a>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <a href="login.html" class="fas fa-user"></a>
        <a href="#" class="fas fa-heart"></a>
        <a href="cart.html" class="fas fa-shopping-cart"></a>
    </div>

</header>

<!-- header section ends -->

<!-- side-bar section starts -->

<div class="side-bar">

    <div id="close-side-bar" class="fas fa-times"></div>

    <div class="user">
        <img src="img/people/111.jpg" alt="">
        <h3>Dinh Ngoc Anh</h3>
        <a href="#">log out</a>
    </div>

    <nav class="navbar">
        <a href="index.html"> <i class="fas fa-angle-right"></i> home </a>
        <a href="about.html"> <i class="fas fa-angle-right"></i> about </a>
        <a href="products.html"> <i class="fas fa-angle-right"></i> products </a>
        <a href="contact.html"> <i class="fas fa-angle-right"></i> contact </a>
        <a href="login.html"> <i class="fas fa-angle-right"></i> login </a>
        <a href="register.html"> <i class="fas fa-angle-right"></i> register </a>
        <a href="cart.html"> <i class="fas fa-angle-right"></i> cart </a>
    </nav>

</div>

<!-- side-bar section ends -->

<!-- login form section starts  -->

<section class="login">

    <form method="POST">
        <h3>login now</h3>
        <input type="text" name="username" placeholder="enter your username" id="" class="box">
        <input type="password" name="password" placeholder="enter your password" id="" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me </label>
        </div>
        <input type="submit" name="btn" value="login now" class="btn">
        <p>don't have an account?</p>
        <a href="register.html" class="btn link">register now</a>
    </form>
<?php 
include "config.php";
if(isset($_POST['btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM acccount WHERE username='$username' AND pasword='$password'";
    $kq = $conn->query($sql)->fetch();
    print_r($kq);
    if(isset($kq['email'])){ 
        $_SESSION['id'] = $kq['id'];
        $_SESSION['email'] = $kq['email'];
        $_SESSION['username'] = $kq['username'];
        
    }else{
        echo  "sai thong tin dang nhap";
    }
}
?>
</section>

<!-- login form section ends  -->














<!-- footer section starts  -->

<section class="quick-links">

    <a href="index.html" class="logo"> <img src="img/logo.png" alt=""></i>  </a>

    <div class="links">
        <a href="index.html"> home </a>
        <a href="about.html"> about </a>
        <a href="products.html"> products </a>
        <a href="contact.html"> contact </a>
        <a href="login.html"> login </a>
        <a href="register.html"> register </a>
        <a href="cart.html"> cart </a>
    </div>

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
    </div>

</section>

<section class="credit">

    <p> created by <span>Dinh Viet Phuong</span> | all rights reserved! </p>

    <img src="images/card_img.png" alt="">

</section>

<!-- footer section ends -->




<!-- swiper js link      -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>