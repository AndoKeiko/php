<<<<<<< HEAD
=======
<?php
session_start();
ini_set('display_errors', 1);
include "funcs.php";
$uid = isset($_SESSION["uid"]) ? $_SESSION["uid"] : '';

//2. DB接続します
$pdo = db_conn();
$sql = "SELECT user_table.img, user_table.name, prof_table.prof_img, prof_table.nickname FROM user_table
LEFT JOIN prof_table ON prof_table.uid = user_table.id
WHERE user_table.id = :uid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}
$header_val = $stmt->fetch();

$header_img = ($header_val['img']=="") ? "./img/icon04.png":$header_val['img'];
$header_name = isset($header_val['name']) ? $header_val['name'] : "";
$header_prof_img = isset($header_val['prof_img']) ? $header_val['prof_img'] : "";
$header_nickname = isset($header_val['nickname']) ? $header_val['nickname'] : "";
// var_dump($header_img .",". $header_name .",". $header_prof_img .",". $header_nickname);
?>
>>>>>>> 3da83af (PHP選手権用提出)
<!DOCTYPE html>
<html lang="ja">

<head>
  <title>本棚アプリ</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="./css/output.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<<<<<<< HEAD
=======
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
>>>>>>> 3da83af (PHP選手権用提出)
</head>

<body>
  <header class="header">
    <div class="container xl:container mxl:mx-auto md:container md:mx-auto">
<<<<<<< HEAD
      <h1 class="h1"><a href="./index.php">Honbako</a></h1>
      <div class="left_box">
        <form name="search_head" action="./index.php" method="post" id="header_search">
        <input type="text" name="intitle" class="input_text"><button type="submit"><i class="bi bi-search"></i></button></form>
=======
      <h1 class="h1"><a href="./index.php"><img src="./img/icon03.png" width="50" height="50">Honbako</a></h1>
      <div class="left_box">
        <form name="search_head" action="./search.php" method="post" id="header_search">
          <input type="text" name="intitle" class="input_text" placeholder="作品名"><button type="submit"><i class="bi bi-search"></i></button>
        </form>
>>>>>>> 3da83af (PHP選手権用提出)
        <ul class="unav">
          <li class="unav_item"><a href="./book_shelf.php"><i class="bi bi-bookshelf"></i></a></li>
          <li class="unav_item"><a href="./prof_edit.php"><i class="bi bi-person-fill-gear"></i></a></li>
          <li class="unav_item prof">
<<<<<<< HEAD
            <p class="user_icon"><img src="./img/img_user01.jpg"></p>
=======
            <p class="user_icon"><img src='<?php echo ($header_prof_img == "") ? $header_img : $header_prof_img; ?>' width="32" height="32"></p>
>>>>>>> 3da83af (PHP選手権用提出)
            <ul class="sub_unav_item">
              <li class="sub_unav_item"><a href="./home.php">ホーム</a></li>
              <li class="sub_unav_item"><a href="./logout.php">ログアウト</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
<<<<<<< HEAD
    <div class="wave-svg-inline">
    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
        <path         d="M0,224L80,197.3C160,171,320,117,480,122.7C640,128,800,192,960,202.7C1120,213,1280,171,1360,149.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
    </svg> 
</div>
  </header>

=======
    <!-- <div class="wave-svg-inline">
      <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
        <path d="M0,224L80,197.3C160,171,320,117,480,122.7C640,128,800,192,960,202.7C1120,213,1280,171,1360,149.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg> -->
      
    </div>
  </header>
<style>



</style>
>>>>>>> 3da83af (PHP選手権用提出)
  <main class="main">
    <div class="container xl:container mxl:mx-auto md:container md:mx-auto">