<!DOCTYPE html>
<html lang="en">

<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap-4.1.2/bootstrap.min.css')}}">
<link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
<link rel="icon" href="{{asset('images/logo_2.png')}}" type="image/png">
</head>
<body>

<div class="menu">

<div class="menu_search">
<form action="#" id="menu_search_form" class="menu_search_form">
<input type="text" class="search_input" placeholder="Search Item" required="required">
<button class="menu_search_button"><img src="images/search.png" alt=""></button>
</form>
</div>

<div class="menu_nav">
<ul>
<li><a href="#">Women</a></li>
<li><a href="#">Men</a></li>
<li><a href="#">Kids</a></li>
<li><a href="#">Home Deco</a></li>
<li><a href="#">Contact</a></li>
</ul>
</div>

<div class="menu_contact">
<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
<div>+1 912-252-7350</div>
</div>
<div class="menu_social">
<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="super_container">

<header class="header">
<div class="header_overlay"></div>
<div class="header_content d-flex flex-row align-items-center justify-content-start">
<div class="logo">
<a href="#">
<div class="d-flex flex-row align-items-center justify-content-start">
<div><img src="{{asset('images/logo_2.png')}}" alt=""></div>
<div>Ola sport <span style="color:#e76003">wears</span></div>
</div>
</a>
</div>
<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
<nav class="main_nav">
<ul class="d-flex flex-row align-items-start justify-content-start">
<li class="active"><a href="#">Women</a></li>
<li><a href="#">Men</a></li>
<li><a href="#">Kids</a></li>
<li><a href="#">Home Deco</a></li>
<li><a href="#">Contact</a></li>
</ul>
</nav>
<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

<div class="header_search">
<form action="#" id="header_search_form">
<input type="text" class="search_input" placeholder="Search Item" required="required">
<button class="header_search_button"><img src="images/search.png" alt=""></button>
</form>
</div>

<div class="user"><a href="#"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>

<div class="cart"><a href="cart.html"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>

<div class="header_phone d-flex flex-row align-items-center justify-content-start">
<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
<div>+1 912-252-7350</div>
</div>
</div>
</div>
</header>
<div class="super_container_inner">
    <div class="super_overlay"></div>

    <div class="home">

        @yield('content')

    </div>
</div>

<footer class="footer">
<div class="footer_content">
<div class="container">
<div class="row">

<div class="col-lg-4 footer_col">
<div class="footer_about">
<div class="footer_logo">
<a href="#">
<div class="d-flex flex-row align-items-center justify-content-start">
<div class="footer_logo_icon"><img src="{{asset('images/logo_2.png')}}" alt=""></div>
<div>Ola sport <span style="color:#e76003">wears</span></div>
</div>
</a>
</div>
<div class="footer_about_text">
<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Fusce venenatis vel velit vel euismod.</p>
</div>
</div>
</div>

<div class="col-lg-4 footer_col">
<div class="footer_menu">
<div class="footer_title">Support</div>
<ul class="footer_list">
<li>
<a href="#"><div>Customer Service<div class="footer_tag_1">online now</div></div></a>
</li>
<li>
<a href="#"><div>Return Policy</div></a>
</li>
<li>
<a href="#"><div>Size Guide<div class="footer_tag_2">recommended</div></div></a>
</li>
<li>
<a href="#"><div>Terms and Conditions</div></a>
</li>
<li>
<a href="#"><div>Contact</div></a>
</li>
</ul>
</div>
</div>

<div class="col-lg-4 footer_col">
<div class="footer_contact">
<div class="footer_title">Stay in Touch</div>
<div class="newsletter">
<form action="#" id="newsletter_form" class="newsletter_form">
<input type="email" class="newsletter_input" placeholder="Subscribe to our Newsletter" required="required">
<button class="newsletter_button">+</button>
</form>
</div>
<div class="footer_social">
<div class="footer_title">Social</div>
<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="footer_bar">
<div class="container">
<div class="row">
<div class="col">
<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
<div class="copyright order-md-1 order-2">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed with <i class="fa fa-heart" aria-hidden="true" style="color:red;"></i> by <a href="https://thecomputinghub.ng/" target="_blank">The Computing Hub</a>
</div>
<nav class="footer_nav ml-md-auto order-md-2 order-1">
<ul class="d-flex flex-row align-items-center justify-content-start">
<li><a href="category.html">Women</a></li>
<li><a href="category.html">Men</a></li>
<li><a href="category.html">Kids</a></li>
<li><a href="category.html">Home Deco</a></li>
<li><a href="#">Contact</a></li>
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>
</footer>
</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>