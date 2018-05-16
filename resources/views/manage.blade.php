<?php
// 【启动session】
use Illuminate\Support\Facades\Auth;

session_start();
// 【设置网页字符编码】
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";

// 【检查是否登陆】
if (!Auth::check()) {
  # code...
  echo "<script>alert('请登录后再提交订单！');parent.location.href='/login';</script>";
  exit();
}

// 【提交checkbox订单】
if (@$_POST['submitcheck']) {
  # code...
  @$aDoor = $_POST['formDoor'];
  $anum = $_POST['num'];
  $apro = $_POST['pro'];
  if(empty($aDoor))
  {
    echo "<script>alert('请选择商品！');parent.location.href='/checkout';</script>";
  }
  else {
//		$conn = new mysqli($servername, $username, $password, $dbname);
    $N = count($aDoor);
    // 【循环插入数据】
    for($i=0; $i < $N; $i++)
    {
      // 【查询数据】
      $subid = $apro[$i];
      $query  = "SELECT * FROM products WHERE id='".$subid."'";
      $result = $conn->query($query);
      $row = $result->fetch_array();
      // 【查询结束】
      //
      //
      // 【插入数据】
      // 【预处理及绑定】
      $stmt = $conn->prepare("INSERT INTO manage (proid, num, name, title, price, img1, orderd, userid, address) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssss", $rowid, $subnum, $rowname, $rowtitle, $rowprice, $rowimg1, $orderd, $userid, $address);
      // 【预处理及绑定结束】
      // 【设置参数并执行】
      $rowid = $row['id'];
      $subnum = $anum[$i];
      $rowname = $row['name'];
      $rowtitle = $row['title'];
      $rowprice = $row['price'];
      $rowimg1 = $rowimg1 = $row['img1'];
      $orderd = uniqid();
      $userid = $_SESSION['loginid'];
      $address = $_POST['address'];
      $stmt->execute();
      // 【执行结束】
      $stmt->close();
      // 【插入数据结束】
      //
      // 【清除插入成功的session记录】
      if ($_SESSION['i'] == 1) {//【只有一件商品】
        # code...
        unset($_SESSION['pro'.$_SESSION['i']]);
        unset($_SESSION['num'.$_SESSION['i']]);
        unset($_SESSION['i']);
      }else{//【不止一件商品】
        $temid = $aDoor[$i];
        while ($temid <= $_SESSION['i']) {
          # code...
          if ($temid != $_SESSION['i']) {
            # code...
            $temnewid = $temid+1;
            $_SESSION['pro'.$temid] = $_SESSION['pro'.$temnewid];
            $_SESSION['num'.$temid] = $_SESSION['num'.$temnewid];
          }

          $temid++;
        }
        unset($_SESSION['pro'.$_SESSION['i']]);
        unset($_SESSION['num'.$_SESSION['i']]);
        $_SESSION['i']--;
      }// 【清除session记录结束】
    }// 【循环插入数据结束】
    $conn->close(); //【关闭数据库】
    echo "<script>alert('订单提交成功！！');parent.location.href=admin</script>";
    exit;
  }//【商品不为空处理结束】
}//【提交submitcheck结束】

// 违法提交订单
if (!@$_POST['submitcheck']) {
  # code...
  echo "<script>parent.location.href='/';</script>";

}


?>