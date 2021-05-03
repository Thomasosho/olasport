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
<link rel="stylesheet" type="text/css" href="{{asset('styles/cart.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('styles/cart_responsive.css')}}">
<link rel="icon" href="{{asset('images/logo_2.png')}}" type="image/png">
</head>
<body>

<div class="menu">

  <div class="menu_search">
    <form action="/search" class="menu_search_form" method="POST" enctype = "multipart/form-data">
      @csrf
      <input type="text" name="q" class="search_input" placeholder="Search Item" required>
      <button class="menu_search_button" type="submit"><img src="{{asset('images/search.png')}}" alt=""></button>
    </form>
  </div>

<div class="menu_nav">
  <ul>
    <small><b>Pages</b></small>
    <li><a href="/">Home</a></li>
    <li><a href="/contactus">Contact</a></li>
    <li><a href="/about">About</a></li>
    <small><b>Categories</b></small>
    @foreach($category as $category)
      <li><a href="/prodctcategory/{{$category->id}}">{{$category->name}}</a></li>
    @endforeach
    @guest
      <small><b>Account</b></small>
      <li><a href="/login">Login </a>|<a href="/register"> Register</a></li>
    @else
      <small><b>Account</b></small>
      @hasrole('admin')
        <li><a href="/dashboard">My Account</a></li>
      @endhasrole
      <li><a href="/my-order">My Order</a></li>
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fa fa-power-off"></i>
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    @endif
  </ul>
</div>

<div class="menu_contact">
    <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
      <div><div><img src="{{asset('images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
      <div><a href="tel:{{$contact->phone1}}" style="color:#000;">+234 {{$contact->phone1}}</a></div>
    </div>
    <div class="menu_social">
      <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
        <li><a href="{{$social->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="{{$social->youtube}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        <li><a href="{{$social->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="{{$social->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
</div>

<div class="super_container">

<header class="header">
  <div class="header_overlay"></div>
  <div class="header_content d-flex flex-row align-items-center justify-content-start">
    <div class="logo">
      <a href="/">
        <div class="d-flex flex-row align-items-center justify-content-start">
          <div><img src="{{asset('images/logo_2.png')}}" alt=""></div>
          <div>OLA!</div>
        </div>
      </a>
    </div>
  <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
  <nav class="main_nav">
    <ul class="d-flex flex-row align-items-start justify-content-start">
      <small><b>Pages</b></small>
      <li><a href="/">Home</a></li>
      <li><a href="/contactus">Contact</a></li>
      <li><a href="/about">About</a></li>
      <small><b>Categories</b></small>
      @foreach($cat as $category)
        <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
      @endforeach
      @guest
        <small><b>Account</b></small>
        <li><a href="/login">Login </a>|<a href="/register"> Register</a></li>
      @else
        <small><b>Account</b></small>
        @hasrole('admin')
          <li><a href="/dashboard">My Account</a></li>
        @endhasrole
        <li><a href="/my-order">My Order</a></li>
        <li>
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-power-off"></i>
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      @endif
    </ul>
  </nav>

  <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

    <div class="header_search">
      <form action="/search" class="header_search_form" method="POST" enctype = "multipart/form-data">
        @csrf
        <input type="text" name="q" class="search_input" placeholder="Search Item" required>
        <button class="header_search_button" type="submit"><img src="{{asset('images/search.png')}}" alt=""></button>
      </form>
    </div>

    @guest
      <div class="user" style="color:#000; border: 1px solid #e75f05; border-radius:5px; padding:10px;"><a href="/login" style="decorate:none; color:#323333;">login </a><span style="color:#e75f05;">|</span><a style="decorate:none; color:#323333;" href="/register"> register</a></div> 
    @else
      @hasrole('admin')
        <div class="user"><a href="/dashboard"><div><img src="{{asset('images/user.svg')}}" title="account" alt="account"></div></a></div>
      @endhasrole
      <div class="user"><a href="/viewcart"><div><img class="svg" src="{{asset('images/cart.svg')}}" title="cart" alt="cart"><div>{{$cart->count()}}</div></div></a></div>
    @endif
    <div class="header_phone d-flex flex-row align-items-center justify-content-start">
      <div><div><img src="{{asset('images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
      <div><a href="tel:{{$contact->phone1}}" style="color:#000;">+234 {{$contact->phone1}}</a></div>
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
                        <p>{!! \Illuminate\Support\Str::limit($about->text, 250, $end='...') !!}</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 footer_col">
                    <div class="footer_menu">
                      <div class="footer_title">Support</div>
                      <ul class="footer_list">
                        <li>
                          <a href="/policy"><div>Return Policy</div></a>
                        </li>
                        <li>
                          <a href="/size"><div>Size Guide<div class="footer_tag_2">recommended</div></div></a>
                        </li>
                        <li>
                          <a href="/terms"><div>Terms and Conditions</div></a>
                        </li>
                        <li>
                          <a href="/contactus"><div>Contact</div></a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-lg-4 footer_col">
                    <div class="footer_social">
                      <div class="footer_title">Social</div>
                      <ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
                        <li><a href="{{$social->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="{{$social->youtube}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <li><a href="{{$social->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="{{$social->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="{{$social->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
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
                    <li><a href="/">Home</a></li>
                    <li><a href="/contactus">Contact</a></li>
                    <li><a href="/about">About</a></li>
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

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('styles/bootstrap-4.1.2/popper.js')}}"></script>
<script src="{{asset('styles/bootstrap-4.1.2/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('plugins/easing/easing.js')}}"></script>
<script src="{{asset('plugins/progressbar/progressbar.min.js')}}"></script>
<script src="{{asset('plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>