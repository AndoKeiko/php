<?php
session_start();
$token = filter_input(INPUT_GET, 'token');
var_dump($token);
$lpw = filter_input(INPUT_POST, "lpw");
$lpw = filter_input(INPUT_POST, "password_confirmation");

// pdoオブジェクトを取得
include("funcs.php");
$pdo = db_conn();

// tokenに合致するユーザーを取得
$sql = 'SELECT * FROM `password_resets` WHERE `token` = :token';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':token', $token, PDO::PARAM_STR);
<<<<<<< HEAD
$stmt->execute();
=======
$status = $stmt->execute();
>>>>>>> 3da83af (PHP選手権用提出)
$value = $stmt->fetch();

// どのレコードにも合致しない無効なtokenであれば、処理を中断
if (!$value) exit('無効なURLです');

// テーブルに保存するパスワードをハッシュ化
$hashedPassword = password_hash($request['password'], PASSWORD_BCRYPT);

if ($passwordResetuser->token_sent_at < $tokenValidPeriod) {
  exit('有効期限切れです');
}



// usersテーブルとpassword_resetsテーブルの原子性を原始性を保証するため、トランザクションを設置
try {
    $pdo->beginTransaction();

    // 該当ユーザーのパスワードを更新
    $sql = 'UPDATE `user_table` SET `password` = :password WHERE `email` = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lpw', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':email', $value->email, PDO::PARAM_STR);
<<<<<<< HEAD
    $stmt->execute();
=======
    $status = $stmt->execute();
>>>>>>> 3da83af (PHP選手権用提出)

    // 用が済んだので、パスワードリセットテーブルから削除
    $sql = 'DELETE FROM `password_resets` WHERE `email` = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $value->email, PDO::PARAM_STR);
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

echo 'パスワードの変更が完了しました。';