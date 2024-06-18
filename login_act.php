<?php
<<<<<<< HEAD
ini_set( 'display_errors', 1 );
session_start();
$redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'index.php';

include("funcs.php");
//POST値
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
if($lid == "" || $lpw == ""){
  $_SESSION['error'] = "IDとパスワードを入れてください";
  redirect("login.php");
=======
ini_set('display_errors', 1);
session_start();
include("funcs.php");
$redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'index.php';

//POST値
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
// var_dump($lpw);
if ($lid == "" || $lpw == "") {
  $_SESSION['error'] = "IDとパスワードを入れてください";
  $_SESSION["uid"] = $val["id"];
  var_dump("IDとパスワードを入れてください");
  redirect("./login.php");
  // exit();
>>>>>>> 3da83af (PHP選手権用提出)
}
//1.  DB接続します
$pdo = db_conn();

//2. データ登録SQL作成
<<<<<<< HEAD
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid=:lid");// prepareメソッドを呼び出し
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR);// bindValueメソッドを呼び出し
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status == false){
=======
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid=:lid"); // prepareメソッドを呼び出し
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); // bindValueメソッドを呼び出し
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
>>>>>>> 3da83af (PHP選手権用提出)
  sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//5.該当１レコードがあればSESSIONに値を代入
<<<<<<< HEAD
$pw = password_verify($lpw, $val["lpw"]);
if($pw){
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["id"] = $val["id"];
  $_SESSION["lid"] = $val["vid"];
  //Login成功時
  redirect($redirect_url);

} else {
  //login失敗時
  $_SESSION['error'] = "IDかパスワードが間違えています";
  redirect("login.php");
}

exit();
?>
=======
if ($val) {
  $pw = password_verify($lpw, $val["lpw"]);
  // var_dump($pw);
  if ($pw) {
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["uid"] = $val["id"];
    $_SESSION["lid"] = $val["lid"];
    //Login成功時
    redirect($redirect_url);
  } else {
    //login失敗時
    $_SESSION['error'] = "IDかパスワードが間違えています";
    var_dump("IDかパスワードが間違えています");
    redirect("./login.php");
  }
} else {
  $_SESSION['error'] = "ユーザーが見つかりません";
  var_dump("ユーザーが見つかりません");
  redirect("./login.php");
}
exit();
>>>>>>> 3da83af (PHP選手権用提出)
