<?php
ini_set("display_errors", 1); 
session_start();
include "funcs.php";

//1. POSTデータ取得
$cname = filter_input(INPUT_POST, "cate_name");
$uid = filter_input(INPUT_POST, "uid");
var_dump($cname);
var_dump($uid);

//2. DB接続します
$pdo = db_conn();
if (empty($cname)) {
  $_SESSION['error'] = "カテゴリー名が未入力です";
  exit();
}
//３．データ登録SQL作成
$sql = "INSERT INTO book_category(uid,cname,indate) VALUES (:uid,:cname,sysdate())";
$stmt = $pdo->prepare($sql);
//バインド変数入れる
$stmt->bindValue(':cname', $cname, PDO::PARAM_STR);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();//true or false
//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
  $_SESSION['error'] = "IDかパスワードが間違えています";
  redirect("book_shelf.php");
} else {
  redirect("book_shelf.php");
}
exit();


?>