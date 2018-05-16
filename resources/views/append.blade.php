<?php

if (@$_POST['submit']) {
  # code...
  session_start();

  if (@$_SESSION['i']) {
    # code...
    $_SESSION['i']++;
  }else{
    $_SESSION['i'] = 1;
  }
  $_SESSION['pro'.$_SESSION['i']] = $_POST['pro'];
  $_SESSION['num'.$_SESSION['i']] = $_POST['num'];

}
?>
@extends('layouts.header')
@section('title', '成功加入购物车')
@section('contents')
  <!--start-breadcrumbs-->
  <div class="breadcrumbs">
    <div class="container">
      <div class="breadcrumbs-main">
        <ol class="breadcrumb">
          <li><a href="/">首页</a></li>
          <li class="active">成功加入购物车</li>
        </ol>
      </div>
    </div>
  </div>
  <!--end-breadcrumbs-->
  <!--start-ckeckout-->
  <div class="ckeckout">
    <div class="container">
      <div class="ckeck-top heading">
        <h2>加入购物车成功</h2>
        <a href="/products?pro={{@$_POST['pro']}}">{{@$_POST['protitle']}}</a>
      </div>
      <div class="ckeckout-top">
        <div class="col-md-5"></div>
        <a href="/checkout"><button type="button" class="btn btn-warning">去购物车结算</button></a>
        <a href="/products"><button type="button" class="btn btn-success">继续购物</button></a>
      </div>
    </div>
  </div>
  <!--end-ckeckout-->
@endsection