<?php
ini_set('display_errors', 1);
session_start();

$token = $_SESSION['token'];

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//POST値
$email = filter_input(INPUT_POST, "email");

if (empty($email)) {
  $_SESSION['error'] = "メールアドレスが未入力です";
  redirect('./requestpass.php');
} else {
  // $email = filter_input(INPUT_POST, "email");
  if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
    $_SESSION['error'] = "メールアドレスの形式が正しくありません。";
    redirect('./requestpass.php');
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
  // var_dump($val);

  if ($val == false) {
    require_once './email_sent.php'; //ダミー
    exit();
  } else {
    $sql = 'SELECT * FROM `password_resets` WHERE `email` = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $value = $stmt->fetch();

    if (!$value) {
      // $valueがなければ、仮登録としてテーブルにインサート
      $sql = 'INSERT INTO `password_resets`(`email`, `token`, `indate`) VALUES(:email, :token, sysdate())';
    } else {
      // 既にフロー中の$value
      $sql = 'UPDATE `password_resets` SET `token` = :token, `indate` = sysdate() WHERE `email` = :email';
    }

    $pdo->beginTransaction();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':token', $token, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();

<<<<<<< HEAD
    $url = "https://gajumaro.sakura.ne.jp/kadai3/show_reset_form.php?urltoken=" . $token;
=======
    $url = "https://gajumaro.sakura.ne.jp/php/show_reset_form.php?urltoken=" . $token;
>>>>>>> 3da83af (PHP選手権用提出)
    $message = "24時間以内に下記URLへアクセスし、パスワードの変更を完了してください。";
    $mailTo = $email;
    $body = <<< EOM
       この度はパスワード再発行のご連絡を致しました。
       24時間以内に下記のURLからご登録下さい。
       {$url}
    EOM;
    mb_language('ja');
    mb_internal_encoding('UTF-8');

    $companyname = "Ando";
    $companymail = "gajumaro@gajumaro.sakura.ne.jp";
    $registation_subject = "パスワード再発行";
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
      redirect("email_sent.php");
    }
  }
}
