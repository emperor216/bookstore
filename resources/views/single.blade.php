@extends('layouts.header')
@section('title', '详情页')
@section('contents')
  <!--start-breadcrumbs-->
  <div class="breadcrumbs">
    <div class="container">
      <div class="breadcrumbs-main">
        <ol class="breadcrumb">
          <li><a href="/">首页</a></li>
          <li class="active">详情页</li>
        </ol>
      </div>
    </div>
  </div>
  <!--end-breadcrumbs-->
  <!--start-single-->
  <div class="single contact">
    <div class="container">
      <div class="single-main">
        <div class="col-md-9 single-main-left">
          <div class="sngl-top">
            <div class="col-md-5 single-top-left">
              <div class="flexslider">
                <ul class="slides">
                  <li data-thumb="images/single/{{$data->img1}}.jpg">
									  <div class="thumb-image"> <img src="images/single/{{$data->img1}}.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                  </li>
								  <li data-thumb="images/single/{{$data->img2}}.jpg">
									  <div class="thumb-image"> <img src="images/single/{{$data->img2}}.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								  </li>
								  <li data-thumb="images/single/{{$data->img3}}.jpg">
								    <div class="thumb-image"> <img src="images/single/{{$data->img3}}.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								  </li>
                </ul>
              </div>
              <!-- FlexSlider -->
              <script src="js/imagezoom.js"></script>
              <script defer src="js/jquery.flexslider.js"></script>
              <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

              <script>
                // Can also be used with $(document).ready()
                $(window).load(function() {
                  $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                  });
                });
              </script>
            </div>
            <div class="col-md-7 single-top-right">
              <form action="/append" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="single-para simpleCart_shelfItem">
                  <h3 style="margin-top: 10px;">{{$data->title}}</h3>
                  <div class="star-on">
                    <ul class="star-footer">
                      <li><a href="#"><i> </i></a></li>
                      <li><a href="#"><i> </i></a></li>
                      <li><a href="#"><i> </i></a></li>
                      <li><a href="#"><i> </i></a></li>
                      <li><a href="#"><i> </i></a></li>
                    </ul>
                    <div class="review">
                      <a href="#"> 浏览量：9999 </a>

                    </div>
                    <div class="clearfix"> </div>
                  </div>

                  <p>{{$data->describe}}</p>
                  <h3 class="item_price">$ {{$data->price}}</h3>

                  <ul class="tag-men">
                    <li><span>作者&#12288;&#12288;</span>
                      <span class="women1">：{{$data->author}}</span></li>
                    <li><span>出版社&#12288;</span>
                      <span class="women1">：{{$data->press}}</span></li>
                    <li><span>出版时间</span>
                      <span class="women1">：{{$data->time}}</span></li>
                    <li><span>库存&#12288;&#12288;</span>
                      <span class="women1">：多的很</span></li>
                  </ul>
                  <div class="available">
                    <ul>
                      <li>
                        <label for="number-input"><span class="women1">购买数量</span></label>
                        <input class="form-control" style="width: 20%;" type="number" value="1" name="num" id="number-input">
                      </li>
                      <div class="clearfix"> </div>
                    </ul>
                  </div>
                    <input type="hidden" name="pro" value="{{$data->id}}">
                    <input type="hidden" name="protitle" value="{{$data->title}}">
                    <input class="btn btn-danger" type="submit" name="submit" value="加入购物车">
                </div>
              </form>
            </div>
            <div class="clearfix"> </div>
          </div>
        </div>
        <div class="col-md-3 single-right">
          <div class="w_sidebar">
            <section  class="sky-form">
              <h4>儿童书店自营</h4>
              <div class="row1 scroll-pane">
                <div class="col col-4">
                  <label class="checkbox">儿童图书网是全国领先的图书销售平台。倡导一种内容、同步出版的全媒体出版模式和一个账号社交化网络书城模式</label>
                </div>
              </div>
            </section>

          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!--end-single-->
@endsection