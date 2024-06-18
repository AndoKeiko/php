<?php
ini_set("display_errors", 1); 
session_start();
include "funcs.php";

//1. POSTデータ取得
$uid = isset($_POST['uid']) ? $_POST['uid'] : 0;
if ($uid == 0) {
  // エラーハンドリング
  die("UIDが正しく送信されていません。");
}
// $bid = filter_input(INPUT_POST, "bid");
$lid = filter_input(INPUT_POST, "lid");
$nickname = filter_input(INPUT_POST, "nickname");
// $prof_img = filter_input(INPUT_POST, "prof_img");
$prof_text = filter_input(INPUT_POST, "prof_text");
$prof_gender = filter_input(INPUT_POST, "prof_gender");
$gender_pub = isset($_POST['gender_pub']) ? 1 : 0;
$birthday = filter_input(INPUT_POST, "birthday");
$birthday_pub = isset($_POST['birthday_pub']) ? 1 : 0;
$web = filter_input(INPUT_POST, "web");
$prefecture = filter_input(INPUT_POST, "prefecture");
$fab_janle = filter_input(INPUT_POST, "fab_janle");
$fab_auth = filter_input(INPUT_POST, "fab_auth");
// $best_3 = filter_input(INPUT_POST, "best_3");

$status = fileUpload("upfile", "upload/");
if ($status == 1) {
    // $prof_img = "ファイルの移動に失敗しました。";
    $prof_img = $_POST['current_prof_img'];
} elseif ($status == 2) {
    // $prof_img = "ファイルが送信されていないか、エラーが発生しました。";
    $prof_img = $_POST['current_prof_img'];
} else {
    $prof_img = $status;
}

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTO prof_table(uid,lid,nickname,prof_img,prof_text,prof_gender,gender_pub,birthday,birthday_pub,web,prefecture,fab_janle,fab_auth,indate) VALUES (:uid,:lid,:nickname,:prof_img,:prof_text,:prof_gender,:gender_pub,:birthday,:birthday_pub,:web,:prefecture,:fab_janle,:fab_auth,sysdate())
        ON DUPLICATE KEY UPDATE
        lid = VALUES(lid), 
        nickname = VALUES(nickname), 
        prof_img = VALUES(prof_img), 
        prof_text = VALUES(prof_text), 
        prof_gender = VALUES(prof_gender), 
        gender_pub = VALUES(gender_pub), 
        birthday = VALUES(birthday), 
        birthday_pub = VALUES(birthday_pub), 
        web = VALUES(web), 
        prefecture = VALUES(prefecture), 
        fab_janle = VALUES(fab_janle), 
        fab_auth = VALUES(fab_auth),
        indate = sysdate()";
$stmt = $pdo->prepare($sql);//true or false
//バインド変数入れる
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':prof_img', $prof_img, PDO::PARAM_STR);
$stmt->bindValue(':prof_text', $prof_text, PDO::PARAM_STR);
$stmt->bindValue(':prof_gender', $prof_gender, PDO::PARAM_INT);
$stmt->bindValue(':gender_pub', $gender_pub, PDO::PARAM_INT);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':birthday_pub', $birthday_pub, PDO::PARAM_INT);
$stmt->bindValue(':web', $web, PDO::PARAM_STR);
$stmt->bindValue(':prefecture', $prefecture, PDO::PARAM_INT);
$stmt->bindValue(':fab_janle', $fab_janle, PDO::PARAM_STR);
$stmt->bindValue(':fab_auth', $fab_auth, PDO::PARAM_STR);
$status = $stmt->execute();//true or false

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
  $_SESSION['error'] = "IDかパスワードが間違えています";
  redirect("prof_edit.php");
} else {
  redirect("prof_edit.php");
}
