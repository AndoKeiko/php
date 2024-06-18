<?php
<<<<<<< HEAD
ini_set("display_errors", 1); 
session_start();
include "funcs.php";
=======
ini_set("display_errors", 1);
session_start();
include "funcs.php";
$pdo = db_conn();
>>>>>>> 3da83af (PHP選手権用提出)

//1. POSTデータ取得
$uid = filter_input(INPUT_POST, "uid");
$gid = filter_input(INPUT_POST, "gid");
$bid = filter_input(INPUT_POST, "bid");
$cid = filter_input(INPUT_POST, "category_list");
$tag = filter_input(INPUT_POST, "valuation_tag");
$review = filter_input(INPUT_POST, "message_review");
$publication = isset($_POST['publicationStatus']) ? 1 : 0;
<<<<<<< HEAD
$status = filter_input(INPUT_POST, "readingStatus");
$rate = filter_input(INPUT_POST, "reviewRate");
$netabare = isset($_POST['netabare-rate']) ? 1 : 0;

// var_dump($rate);

//2. DB接続します
$pdo = db_conn();

$sql = "SELECT COUNT(*) FROM book_table WHERE bid = :bid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
$stmt->execute();

//4. 抽出データ数を取得
$val = $stmt->fetch();
if ($val[0] == 0) {
  $_SESSION['error'] = "指定された本が存在しません。";
  redirect("book_shelf.php");
  exit();
}

//３．データ登録SQL作成
$sql = "INSERT INTO review_table(uid,bid,gid,tag,review,publication,status,rate,netabare,indate) VALUES (:uid,:bid,:gid,:tag,:review,:publication,:status,:rate,:netabare,sysdate())";
$stmt = $pdo->prepare($sql);//true or false
//バインド変数入れる
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
$stmt->bindValue(':gid', $gid, PDO::PARAM_INT);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
$stmt->bindValue(':review', $review, PDO::PARAM_STR);
$stmt->bindValue(':publication', $publication, PDO::PARAM_INT);
$stmt->bindValue(':status', $status, PDO::PARAM_INT);
$stmt->bindValue(':rate', $rate, PDO::PARAM_INT);
$stmt->bindValue(':netabare', $netabare, PDO::PARAM_INT); 
$status = $stmt->execute();//true or false
=======
$readingStatus = isset($_POST['readingStatus']) ? $_POST['readingStatus'] : 0;
$rate = filter_input(INPUT_POST, "reviewRate");
$netabare = isset($_POST['netabare']) ? 1 : 0;

//３．データ登録SQL作成
// $sql = "INSERT INTO review_table(uid,bid,cid,gid,tag,review,publication,status,rate,netabare,indate) VALUES (:uid,:bid,:cid,:gid,:tag,:review,:publication,:status,:rate,:netabare,sysdate())
//         ON DUPLICATE KEY UPDATE
//         uid = VALUES(uid),  
//         gid = VALUES(gid),  
//         tag = VALUES(tag), 
//         review = VALUES(review), 
//         publication = VALUES(publication), 
//         status = VALUES(status), 
//         rate = VALUES(rate), 
//         netabare = VALUES(netabare), 
//         indate = sysdate()";
// 既存のレコードをチェック
$sql_check = "SELECT COUNT(*) FROM review_table WHERE gid = :gid AND uid = :uid";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->bindValue(':gid', $gid, PDO::PARAM_STR);
$stmt_check->bindValue(':uid', $uid, PDO::PARAM_INT);
$stmt_check->execute();
$record_exists = $stmt_check->fetchColumn();

if ($record_exists) {
  // レコードが存在する場合は更新
  $sql = "UPDATE review_table SET 
            cid = :cid, 
            tag = :tag, 
            review = :review, 
            publication = :publication, 
            status = :status, 
            rate = :rate, 
            netabare = :netabare, 
            indate = sysdate() 
            WHERE gid = :gid AND uid = :uid";
  $stmt = $pdo->prepare($sql); //true or false
  $stmt->bindValue(':cid', $cid, PDO::PARAM_INT);
  $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
  $stmt->bindValue(':review', $review, PDO::PARAM_STR);
  $stmt->bindValue(':publication', $publication, PDO::PARAM_INT);
  $stmt->bindValue(':status', $readingStatus, PDO::PARAM_INT);
  $stmt->bindValue(':rate', $rate, PDO::PARAM_INT);
  $stmt->bindValue(':netabare', $netabare, PDO::PARAM_INT);
  $stmt->bindValue(':gid', $gid, PDO::PARAM_STR);
  $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
} else {
  // レコードが存在しない場合は挿入
  $sql = "INSERT INTO review_table(uid,bid,cid,gid,tag,review,publication,status,rate,netabare,indate) 
            VALUES (:uid,:bid,:cid,:gid,:tag,:review,:publication,:status,:rate,:netabare,sysdate())";
  $stmt = $pdo->prepare($sql); //true or false
  //バインド変数入れる
  $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
  $stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
  $stmt->bindValue(':cid', $cid, PDO::PARAM_INT);
  $stmt->bindValue(':gid', $gid, PDO::PARAM_STR);
  $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
  $stmt->bindValue(':review', $review, PDO::PARAM_STR);
  $stmt->bindValue(':publication', $publication, PDO::PARAM_INT);
  $stmt->bindValue(':status', $readingStatus, PDO::PARAM_INT);
  $stmt->bindValue(':rate', $rate, PDO::PARAM_INT);
  $stmt->bindValue(':netabare', $netabare, PDO::PARAM_INT);
}

$status = $stmt->execute(); //true or false
>>>>>>> 3da83af (PHP選手権用提出)

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
<<<<<<< HEAD
  $_SESSION['error'] = "IDかパスワードが間違えています";
  redirect("book_shelf.php");
} else {
=======
  redirect("book_shelf.php");
} else {
  var_dump("保存したよ");
>>>>>>> 3da83af (PHP選手権用提出)
  redirect("book_shelf.php");
}
