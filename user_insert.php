<?php
ini_set('display_errors', 1);
session_start();
//クロスサイトリクエストフォージェリ（CSRF）対策

$token = $_SESSION['token'];
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

include "funcs.php";
$pdo = db_conn();

$email = filter_input(INPUT_POST, "email");

if (empty($email)) {
  $_SESSION['error'] = "メールアドレスが未入力です";
  redirect('./user.php');
} else {
  // $email = filter_input(INPUT_POST, "email");
  if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
    $_SESSION['error'] = "メールアドレスの形式が正しくありません。";
    redirect('./user.php');
  }
  // var_dump($_POST['email']);
  $sql = "SELECT email FROM user_table WHERE email=:email";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $status = $stmt->execute();
  if ($status == false) {
    sql_error($stmt);
  }

  $val = $stmt->fetch();
  var_dump($val);

  if ($val !== false) {
    $_SESSION['error'] = "このメールアドレスはすでに登録されております。";
    redirect('./user.php');
  } else {
    $pdo->beginTransaction();
      $name = filter_input(INPUT_POST, "name");
<<<<<<< HEAD
=======
      $img = filter_input(INPUT_POST, "img") ? filter_input(INPUT_POST, "img") :"";
>>>>>>> 3da83af (PHP選手権用提出)
      $email = filter_input(INPUT_POST, "email");
      $lid = filter_input(INPUT_POST, "lid");
      $lpw = filter_input(INPUT_POST, "lpw");
      $token = filter_input(INPUT_POST, "token");
<<<<<<< HEAD
=======
      // $lpw = password_hash($lpw, PASSWORD_DEFAULT);
>>>>>>> 3da83af (PHP選手権用提出)
      $lpw = password_hash($lpw, PASSWORD_DEFAULT);
      $urltoken = hash('sha256', uniqid(rand(), 1));

      $sql = "INSERT INTO user_table(name,email,lid,lpw,token,member_flg,indate)VALUES(:name,:email,:lid,:lpw,:token,0,sysdate())";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
      $stmt->bindValue(':email', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
      $stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
      $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
      $stmt->bindValue(':token', $urltoken, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
      // $stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
      $status = $stmt->execute();

<<<<<<< HEAD
      $url = "https://gajumaro.sakura.ne.jp/kadai3/signup.php?urltoken=" . $urltoken;
=======
      $url = "https://gajumaro.sakura.ne.jp/php/signup.php?urltoken=" . $urltoken;
>>>>>>> 3da83af (PHP選手権用提出)
      $message = "メールをお送りしました。24時間以内にメールに記載されたURLからメールを認証して下さい。";
      $mailTo = $email;
      $body = <<< EOM
       この度はご登録いただきありがとうございます。
       24時間以内に下記のURLからご登録下さい。
       {$url}
    EOM;
      mb_language('ja');
      mb_internal_encoding('UTF-8');

      $companyname = "Ando";
      $companymail = "gajumaro@gajumaro.sakura.ne.jp";
      $registation_subject = "仮登録ありがとうございます";
      //Fromヘッダーを作成
      $header = 'From: ' . mb_encode_mimeheader($companyname) . '<' . $companymail . '>';

      if (mb_send_mail($mailTo, $registation_subject, $body, $header, '-f' . $companymail)) {
        //セッション変数を全て解除
        $pdo->commit();
        $_SESSION = array();
        //クッキーの削除
        if (isset($_COOKIE["PHPSESSID"])) {
          setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        //セッションを破棄する
        session_destroy();
        $message = "メールをお送りしました。24時間以内にメールに記載されたURLからご登録下さい。";
      }

    //４．データ登録処理後
    if ($status == false) {
      sql_error($stmt);
    } else {
      redirect("signup02.php");
    }
  }
}
