<?php
session_start();
$token = isset($_SESSION['token']) ? str_replace(' ', '+', urldecode($_SESSION['token'])) : "";
// var_dump($token);
$lpw = filter_input(INPUT_POST, "lpw");
$password_confirmation = filter_input(INPUT_POST, "password_confirmation");
// pdoオブジェクトを取得
include("funcs.php");

if (empty($lpw)) {
  $_SESSION['error'] = "パスワードが未入力です";
  redirect('./show_reset_form.php?urltoken='.$token);
  exit();
}
if($lpw != $password_confirmation){
  $_SESSION['error'] = "２つのパスワードが異なります";
  redirect('./show_reset_form.php?urltoken='.$token);
  exit();
}
if (!preg_match("/^[a-zA-Z0-9]+$/", $lpw)) {
  $_SESSION['error'] = "パスワードの形式が正しくありません。半角英数字を使ってください";
  redirect('./show_reset_form.php?urltoken='.$token);
  exit();
}

$pdo = db_conn();

// tokenに合致するユーザーを取得
$sql = "SELECT * FROM password_resets WHERE token = :token";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':token', $token, PDO::PARAM_STR);
<<<<<<< HEAD
$stmt->execute();
=======
$status = $stmt->execute();
>>>>>>> 3da83af (PHP選手権用提出)
$value = $stmt->fetch();
// var_dump($value);

// どのレコードにも合致しない無効なtokenであれば、処理を中断
if (!$value) {
  $errorInfo = $stmt->errorInfo();
  // var_dump($errorInfo);
  exit('無効なURLです');
}
//  var_dump($value['email']);
// $tokenValidPeriod = (new \DateTime())->modify("-24 hour")->format('Y-m-d H:i:s');
// $sql = "SELECT email FROM user_table WHERE token=:token AND member_flg=0 AND indate > now() - interval 24 hour";
if (new DateTime($value['indate']) < (new DateTime())->modify('-24 hours')) {
  exit('有効期限切れです');
}
$hashedPassword = password_hash($lpw, PASSWORD_DEFAULT);
<<<<<<< HEAD
=======
// var_dump($lpw);
// var_dump($hashedPassword);
>>>>>>> 3da83af (PHP選手権用提出)
// usersテーブルとpassword_resetsテーブルの原子性を原始性を保証するため、トランザクションを設置
try {
    $pdo->beginTransaction();

    // 該当ユーザーのパスワードを更新
<<<<<<< HEAD
    $sql = 'UPDATE `user_table` SET `lpw` = :lpw WHERE `email` = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lpw', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':email', $value['email'], PDO::PARAM_STR);
    $stmt->execute();
=======
    $sql = 'UPDATE `user_table` SET `lpw` = :lpw, `indate` = sysdate() WHERE `email` = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lpw', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':email', $value['email'], PDO::PARAM_STR);
    $status = $stmt->execute();
>>>>>>> 3da83af (PHP選手権用提出)

    // 用が済んだので、パスワードリセットテーブルから削除
    $sql = 'DELETE FROM `password_resets` WHERE `email` = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $value['email'], PDO::PARAM_STR);
<<<<<<< HEAD
    $stmt->execute();
=======
    $status = $stmt->execute();
>>>>>>> 3da83af (PHP選手権用提出)

    $pdo->commit();

} catch (Exception $e) {
    $pdo->rollBack();

    exit($e->getMessage());
}

redirect('./reset_ok.php');