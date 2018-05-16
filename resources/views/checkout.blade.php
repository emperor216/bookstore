@extends('layouts.header')
@section('title', '购物车')
@section('contents')
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">首页</a></li>
					<li class="active">购物车</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				<h2>购物车</h2>
			</div>
			<div class="ckeckout-top">
			<div class="cart-items">
			 <h3>购物清单（<?php session_start(); echo @$_SESSION['i'];?>）</h3>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});
			   </script>
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});
			   </script>
				
			<div class="in-check" >
				<ul class="unit">
					<li style="text-align: left; width: 10% !important;;"><span>商品</span></li>
					<li style="text-align: center; width: 30% !important;;"><span>商品名称</span></li>
					<li style="text-align: center;"><span>单价</span></li>
					<li><span>数量</span></li>
					<li><span>订单处理</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
				<form action="/manage" method="post" onkeydown="if(event.keyCode==13){return false;}">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        <?php
				if (@$_SESSION['i']) {
          // 连接数据库
          $servername = "localhost";
          $username = "root";
          $password = "root";
          $dbname = "bookstore";

          // 创建连接
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          mysqli_query($conn, "set names 'utf8'");
					# code...
					$i = 1;
					while ($i <= $_SESSION['i']) {
						# code...
						$result = mysqli_query($conn, "SELECT * FROM products WHERE id='".$_SESSION['pro'.$i]."'");
						$row = mysqli_fetch_array($result);
						echo '<ul class="cart-header">
							<li style="width: 10% !important;;" class="ring-in"><a href="single.php?pro='.$row['id'].'" ><img style="height:80px; width:80px;" src="images/single/'.$row['img1'].'.jpg" class="img-responsive" alt=""></a>
							</li>
							<li style="width: 30% !important;"><span class="name">'.$row['title'].'</span></li>
							<li><span class="cost" style="text-align: center!important;">$ '.$row['price'].'</span></li>
							<li><span class="cost"><input class="form-control" style="width: 50%;" type="number" value="'.$_SESSION['num'.$i].'" name="num[]"><input  type="hidden" value="'.$_SESSION['pro'.$i].'" name="pro[]"></span></li>
							<li><span style="margin-top:1.8em;">
							<label class="custom-control custom-checkbox">
							<input class="custom-control-input" type="checkbox" name="formDoor[]" value="'.$i.'" /><a style="text-decoration:none;">选择商品</a></label>
							<a href="/cancel?can='.$i.'"><div class="btn btn-warning"  style="margin:0px 5px;">删除商品</div></a>
							</span>
							</li>
						<div class="clearfix"> </div>
						</ul>';
						$i++;
					}
				}

				?>
  					<input name="address" type="text" class="form-control" placeholder="请填写收件人地址" aria-label="Recipient's username" aria-describedby="basic-addon2">
  					<div class="col-md-12" style="margin-top: 1.0em;">
					<input class="btn btn-success" type="submit" name="submitcheck" value="提交订单">
					</div>
				</form>
			</div>
			</div>  
		 </div>
		</div>
	</div>
	<!--end-ckeckout-->
@endsection