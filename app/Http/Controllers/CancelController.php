<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CancelController extends Controller {
  public function index()
  {
    if (@$_GET['can']) {
      session_start();
      # code...
      $temid = $_GET['can'];
      if ($_SESSION['i'] == 1) {
        # code...
        unset($_SESSION['pro'.$_SESSION['i']]);
        unset($_SESSION['num'.$_SESSION['i']]);
        unset($_SESSION['i']);
      }else{
        while ($temid <= $_SESSION['i']) {
          # code...
          $temnewid = $temid + 1;
          @$_SESSION['pro'.$temid] = $_SESSION['pro'.$temnewid];
          @$_SESSION['num'.$temid] = $_SESSION['num'.$temnewid];
          $temid++;
        }
        unset($_SESSION['pro'.$_SESSION['i']]);
        unset($_SESSION['num'.$_SESSION['i']]);
        $_SESSION['i']--;
      }

      // header("Location: http://localhost/cpts_431_sh/checkout.php");
      echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
      echo "<script>alert('删除成功！');parent.location.href='/checkout';</script>";
    }

    if (@$_GET['pro']) {
      echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";

      $query  = "delete from manage where id='".$_GET['pro']."'";
      $result = DB::delete($query);
      if ($result){
      echo "<script>alert('取消订单成功！');parent.location.href=admin/script>";
      }else {
      echo "<script>alert('取消订单失败！');parent.location.href='admin1.admin/script>";
      }
    }
  }
}