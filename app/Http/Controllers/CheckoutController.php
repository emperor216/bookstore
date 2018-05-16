<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller {
  public function index()
  {
    return view('checkout');
  }
}