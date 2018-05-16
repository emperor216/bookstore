<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
  <script src="js/jquery-1.11.0.min.js"></script>
  <!--Custom-Theme-files-->
  <!--theme-style-->
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!--//theme-style-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--start-menu-->
  <script src="js/simpleCart.min.js"> </script>
  <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
  <script type="text/javascript" src="js/memenu.js"></script>
  <script>$(document).ready(function(){$(".memenu").memenu();});</script>
  <!--dropdown-->
  <script src="js/jquery.easydropdown.js"></script>
</head>
<body>
<!--top-header-->
<div class="top-header">
  <div class="container">
    <div class="top-header-main">
      <div class="col-md-6 top-header-left">
        <div class="drop">
          <div class="box">
            @guest
              <a href="{{ route('login') }}" style="color:#fff;"><div>{{ __('Login') }}</div></a>
              <a href="{{ route('register') }}" style="color:#fff;"><div>{{ __('Register') }}</div></a>
            @else
              <a href="" style="color:#fff;"><div>{{ Auth::user()->name }}</div></a>
              <a style="color:#fff;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><div>{{ __('退出登陆') }}</div>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            @endguest
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-6 top-header-left">
        <div class="cart box_1">
          <a href="/checkout">
            <img src="/images/cart-1.png" alt="" />
          </a>
          <p><a href="/checkout" class="simpleCart_empty">进入购物车</a></p>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
  <a href="/index"><h1>儿童图书网</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
  <div class="container">
    <div class="header">
      <div class="col-md-9 header-left">
        <div class="top-nav">
          <ul class="memenu skyblue"><li class="active"><a href="/">首页</a></li>
            <li class="grid"><a href="/products">图书类目</a>
              <div class="mepanel">
                <div class="row">
                  <div class="col1 me-one">
                    <h4>幼儿启蒙</h4>
                    <ul>
                      <li><a href="/products?list=1.1&listnm=幼儿认知">幼儿认知</a></li>
                      <li><a href="/products?list=1.2&listnm=智力启蒙">智力启蒙</a></li>
                    </ul>
                  </div>
                  <div class="col1 me-one">
                    <h4>少儿英语 | 国学</h4>
                    <ul>
                      <li><a href="/products?list=2.1&listnm=双语读物">双语读物</a></li>
                      <li><a href="/products?list=2.2&listnm=分级阅读">分级阅读</a></li>
                      <li><a href="/products?list=2.3&listnm=少儿国学">少儿国学</a></li>
                    </ul>
                  </div>
                  <div class="col1 me-one">
                    <h4>儿童文学</h4>
                    <ul>
                      <li><a href="/products?list=3.1&listnm=课外读物">课外读物</a></li>
                      <li><a href="/products?list=3.2&listnm=启蒙读物">启蒙读物</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="grid"><a href="/introduce">关于我们</a>
            </li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="col-md-3 header-right">
        <div class="search-bar">
          <ul class="memenu skyblue">
            @if(Auth::check())
              <li class="grid" style="float: right;"><a href="/admin" style="padding-right: 0px;">我的订单</a></li>
            @endif
          </ul>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!--bottom-header-->

@yield('contents')

<!--about-starts-->
<!--footer-starts-->
<div class="footer">
  <div class="container">
    <div class="footer-top">
      <div class="col-md-12 footer-center">
        <p>Copyright &copy; 2015.Company name All rights reserved.</p>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--footer-end-->
</body>
</html>