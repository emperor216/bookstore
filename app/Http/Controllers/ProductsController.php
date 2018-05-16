<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductsController extends Controller {
  public function index()
  {
    if (@$_GET['list']) {
      # code...
      $list = $_GET['list'];
      $sql = "SELECT * FROM products WHERE list='".$list."'";
    }else{
      $sql = "SELECT * FROM products";
    }

    $products = DB::select($sql);

    $i=1;
    return view('products', ['products' => $products, 'i' => $i]);
  }
}