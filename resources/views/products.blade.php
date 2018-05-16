@extends('layouts.header')
@section('title', '图书类目')
@section('contents')
  <!--start-breadcrumbs-->
  <div class="breadcrumbs">
    <div class="container">
      <div class="breadcrumbs-main">
        <ol class="breadcrumb">
          <li><a href="/">首页</a></li>
          <li class="active">图书类目</li>
          <li class="active">{{@$_GET['listnm']}}</li>
        </ol>
      </div>
    </div>
  </div>
  <!--end-breadcrumbs-->
  <!--prdt-starts-->
  <div class="prdt" style="padding-top: 3em;">
    <div class="container">
      <div class="prdt-top">
        <div class="col-md-12 prdt-left">

          @foreach($products as $product)
            @if ($i == 1)
            <div class="product-one">
            @endif

            <div class="col-md-3 product-left p-left">
              <div class="product-main simpleCart_shelfItem">
							  <a href="/single?pro={{$product->id}}" class="mask"><img class="img-responsive zoom-img" src="images/single/{{$product->img1}}.jpg" alt="" /></a>
								<div class="product-bottom">
									<h3>{{$product->name}}</h3>
										<p>浏览详情</p>
										<h4><span class=" item_price">$ {{$product->price}}</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
              </div>
            </div>
            @if ($i == 4)
                <div class="clearfix"></div></div>
              <?php $i = 1;?>
            @else
              <?php $i++;?>
            @endif
            <?php $abbcc = 'asdaasa'; ?>
          @endforeach
          @if (@$abbcc)
            <div class="clearfix"></div></div>
          @endif
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!--product-end-->
@endsection
