<?php
session_start();
include "funcs.php";
sschk();
$pdo = db_conn();

if (isset($_GET['bid'])) {
  $bid = $_GET["bid"];
  // book_tableから削除
  $stmt = $pdo->prepare("DELETE FROM book_table WHERE bid=:bid");
  $stmt->bindValue(":bid", $bid, PDO::PARAM_INT);
  $status = $stmt->execute();
  
  // review_tableから削除
  $stmt = $pdo->prepare("DELETE FROM review_table WHERE bid=:bid");
  $stmt->bindValue(":bid", $bid, PDO::PARAM_INT);
  $status = $stmt->execute();
  
  // review_commentから削除
  $stmt = $pdo->prepare("DELETE FROM review_comment WHERE bid=:bid");
  $stmt->bindValue(":bid", $bid, PDO::PARAM_INT);
  $status = $stmt->execute();
}
if($status==false){
  sql_error($stmt);
}else{
  redirect("book_shelf.php");
}

?>