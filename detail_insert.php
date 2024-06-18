<?php
ini_set("display_errors", 1); 
session_start();
include "funcs.php";
sschk();

//1. POSTデータ取得
<<<<<<< HEAD
$uid = $_POST["uid"];
$gid = $_POST["gid"];
$title = $_POST["title"];
$authors = $_POST["authors"];
$publisher = $_POST["publisher"];
$publishedDate = $_POST["publishedDate"];
$thumbnail = $_POST["thumbnail"];
$description = $_POST["description"];
$buyLink = $_POST["buyLink"];
$isbn10 = $_POST["isbn10"];
$isbn13 = $_POST["isbn13"];
//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTO book_table(uid,gid,title,isbn10,isbn13,authors,publisher,publishedDate,thumbnail,description,buyLink,indate) VALUES (:uid,:gid,:title,:isbn10,:isbn13,:authors,:publisher,:publishedDate,:thumbnail,:description,:buyLink,sysdate())";
$stmt = $pdo->prepare($sql);
//バインド変数入れる
$stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
$stmt->bindValue(':gid', $gid, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':isbn10', $isbn10, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':isbn13', $isbn13, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':authors', $authors, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 
$stmt->bindValue(':publisher', $publisher, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':publishedDate', $publishedDate, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':thumbnail', $thumbnail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':description', $description, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':buyLink', $buyLink, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//true or false
//４．データ登録処理後
if($status==false){
  echo "false";
}else{
  echo "true";
=======
$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
$gid = filter_input(INPUT_POST, "gid");
$title = filter_input(INPUT_POST, "title");
$authors = filter_input(INPUT_POST, "authors");
$publisher = filter_input(INPUT_POST, "publisher");
$publishedDate = filter_input(INPUT_POST, "publishedDate");
$thumbnail = filter_input(INPUT_POST, "thumbnail");
$description = filter_input(INPUT_POST, "description");
$buyLink = filter_input(INPUT_POST, "buyLink");
$isbn10 = filter_input(INPUT_POST, "isbn10");
$isbn13 = filter_input(INPUT_POST, "isbn13");
//2. DB接続します
$pdo = db_conn();
var_dump($uid);

// gidの重複チェック
$sql = "SELECT COUNT(*) FROM book_table WHERE gid = :gid AND uid = :uid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':gid', $gid, PDO::PARAM_STR);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$stmt->execute();
$count = $stmt->fetchColumn();

if ($count > 0) {
    // gidが既に存在する場合、更新処理を行う
    $sql = "UPDATE book_table SET title=:title, isbn10=:isbn10, isbn13=:isbn13, authors=:authors, publisher=:publisher, publishedDate=:publishedDate, thumbnail=:thumbnail, description=:description, buyLink=:buyLink, indate=sysdate() WHERE gid=:gid AND uid=:uid";
} else {
    // gidが存在しない場合、新規登録を行う
    $sql = "INSERT INTO book_table(uid,gid,title,isbn10,isbn13,authors,publisher,publishedDate,thumbnail,description,buyLink,indate) VALUES (:uid,:gid,:title,:isbn10,:isbn13,:authors,:publisher,:publishedDate,:thumbnail,:description,:buyLink,sysdate())";
}

$stmt = $pdo->prepare($sql);

//バインド変数入れる
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$stmt->bindValue(':gid', $gid, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':isbn10', $isbn10, PDO::PARAM_STR);
$stmt->bindValue(':isbn13', $isbn13, PDO::PARAM_STR);
$stmt->bindValue(':authors', $authors, PDO::PARAM_STR);
$stmt->bindValue(':publisher', $publisher, PDO::PARAM_STR);
$stmt->bindValue(':publishedDate', $publishedDate, PDO::PARAM_STR);
$stmt->bindValue(':thumbnail', $thumbnail, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':buyLink', $buyLink, PDO::PARAM_STR);
$status = $stmt->execute();//true or false

//４．データ登録処理後
//3. SQL実行時にエラーがある場合STOP
if($status == false){
  sql_error($stmt);
>>>>>>> 3da83af (PHP選手権用提出)
}
$_SESSION["uid"] = $uid;
$_SESSION["gid"] = $gid;
$_SESSION["bid"] = $bid;
$_SESSION["title"] = $title;
$_SESSION["authors"] = $authors;
$_SESSION["publisher"] = $publisher;
$_SESSION["publishedDate"] = $publishedDate;
$_SESSION["thumbnail"] = $thumbnail;
$_SESSION["description"] = $description;
$_SESSION["buyLink"] = $buyLink;
$_SESSION["isbn10"] = $isbn10;
$_SESSION["isbn13"] = $isbn13;

redirect('./book_shelf.php');