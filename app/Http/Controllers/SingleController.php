<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SingleController extends Controller {
  public function index()
  {
    $data = DB::table('products')->where('id', $_GET['pro'])->first();

    return view('single', ['data' => $data]);
  }
}