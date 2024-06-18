<?php
<<<<<<< HEAD
ini_set( 'display_errors', 1 );
session_start();
include "funcs.php";
//1. POSTデータ取得
$uid = isset($_POST["uid"]) ? $_POST["uid"] : '';
$gid = isset($_POST["gid"]) ? $_POST["gid"] : '';
$authors = isset($_POST["authors"]) ? $_POST["authors"] : '';
$publisher = isset($_POST["publisher"]) ? $_POST["publisher"] : '';
$publishedDate = isset($_POST["publishedDate"]) ? $_POST["publishedDate"] : '';
$title = isset($_POST["title"]) ? $_POST["title"] : '';
$thumbnail = isset($_POST["thumbnail"]) ? $_POST["thumbnail"] : '';
$description = isset($_POST["description"]) ? $_POST["description"] : '';
$buyLink = isset($_POST["buyLink"]) ? $_POST["buyLink"] : '';
$isbn10 = isset($_POST["isbn10"]) ? $_POST["isbn10"] : '';
$isbn13 = isset($_POST["isbn13"]) ? $_POST["isbn13"] : '';

//2. DB接続します
$pdo = db_conn();

// $sql = "SELECT * FROM review_table WHERE gid = :gid";
$sql = "SELECT review_table.*, user_table.*,book_table.* FROM review_table
INNER JOIN user_table ON review_table.uid = user_table.id
INNER JOIN book_table ON review_table.bid = book_table.bid
WHERE user_table.id = :uid
ORDER BY review_table.indate ASC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$stmt->execute();

=======
ini_set('display_errors', 1);
//1. POSTデータ取得
$uid = isset($_GET["uid"]) ? $_GET["uid"] : '';
$gid = isset($_GET["gid"]) ? $_GET["gid"] : '';
// var_dump($gid);
if (!isset($_GET["home_flg"])) {
  // var_dump("aaa");
  $bid = isset($_POST["bid"]) ? $_POST["bid"] : '';
  $uid = isset($_POST["uid"]) ? $_POST["uid"] : '';
  $gid = isset($_POST["gid"]) ? $_POST["gid"] : $_GET["gid"];
  $authors = isset($_POST["authors"]) ? $_POST["authors"] : '';
  $publisher = isset($_POST["publisher"]) ? $_POST["publisher"] : '';
  $publishedDate = isset($_POST["publishedDate"]) ? $_POST["publishedDate"] : '';
  $title = isset($_POST["title"]) ? $_POST["title"] : '';
  $thumbnail = isset($_POST["thumbnail"]) ? $_POST["thumbnail"] : '';
  $description = isset($_POST["description"]) ? $_POST["description"] : '';
  $buyLink = isset($_POST["buyLink"]) ? $_POST["buyLink"] : '';
  $isbn10 = isset($_POST["isbn10"]) ? $_POST["isbn10"] : '';
  $isbn13 = isset($_POST["isbn13"]) ? $_POST["isbn13"] : '';
} else {
  // var_dump("bbb");
  $bid = isset($_GET["bid"]) ? $_GET["bid"] : '';
  $authors = '';
  $publisher = '';
  $publishedDate = '';
  $title = '';
  $thumbnail = '';
  $description = '';
  $buyLink = '';
  $isbn10 = '';
  $isbn13 = '';
}

include 'header.php';
//2. DB接続します
$pdo = db_conn();
// var_dump($gid);
// $sql = "SELECT * FROM review_table WHERE gid = :gid";
$sql = "SELECT
 review_table.*,
 book_table.*
FROM review_table
INNER JOIN book_table ON review_table.gid = book_table.gid
WHERE review_table.gid = :gid
ORDER BY review_table.indate ASC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':gid', $gid, PDO::PARAM_STR);
$status = $stmt->execute();
if ($status == false) {
  sql_error($stmt);
}
>>>>>>> 3da83af (PHP選手権用提出)
//4. 抽出データ数を取得
$vals = $stmt->fetchAll();
// var_dump($vals);
?>
<<<<<<< HEAD
<?php include 'header.php'; ?>

<form action="./detail_insert.php" method="post" id="booklist_form" class="booklist_form">
  <div class="detail_box">
    <div class="detail_left">
      <p class="book_item_img"><img src="<?= $thumbnail; ?>"></p>
    </div>
    <div class="detail_right">
      <h2 class="bookitem_title"><?= $title; ?><span>(<?= $publisher; ?>)</span></h2>
      <p class="bookitem_authors">著者: <?= $authors; ?></p>
      <p class="bookitem_publisher"><?= $publisher; ?> (<?= $publishedDate; ?>発売)</p>
      <p class="book_item_description"><?= $description; ?></p>
=======
<?php
$firstVal = isset($vals[0]) ? $vals[0] : null;
?>
<form action="./detail_insert.php" method="post" id="booklist_form" class="booklist_form">
  <div class="detail_box">
    <div class="detail_left">
      <p class="book_item_img"><img src="<?= (!$thumbnail) ? $vals[0]["thumbnail"] : $thumbnail; ?>"></p>
    </div>
    <div class="detail_right">
      <h2 class="bookitem_title"><?php echo ($title=="") ? $vals[0]["title"] : $title; ?>
      <span>(<?php echo ($publisher=="") ? $vals[0]["publisher"] : $publisher; ?>)</span></h2>
      <p class="bookitem_authors">著者: <?php echo (!$authors) ? $vals[0]["authors"] : $authors; ?></p>
      <p class="bookitem_publisher"><?php echo (!$publisher) ? $vals[0]["publisher"] : $publisher; ?> (<?php echo ($publishedDate=="") ? $vals[0]["publishedDate"] : $publishedDate; ?>発売)</p>
      <p class="book_item_description"><?php echo ($description=="") ? $vals[0]["description"] : $description; ?></p>
>>>>>>> 3da83af (PHP選手権用提出)
      <ul class="book_btn">
        <li class="book_btn_item"><button type="submit"><i class="bi bi-plus-circle"></i> 本箱に入れる</button></li>
        <li class="book_btn_item"><a href="<?= $buyLink ?>" target="_blank">購入する</a></li>
      </ul>

    </div>
<<<<<<< HEAD
    <?php
      if($vals){
    ?>
    <div class="detail_sns">
      <h2 class="h2">感想</h2>
    <?php
    foreach($vals as $v):
      // var_dump($v); 
      if($v["review"]==1){

      } else if($v["review"]==2) {
        
      } else if($v["review"]==3) {
        
      } else if($v["review"]==4) {
      
      } else {
        
      }
    ?>    
      <div class="review_box">
      <p><?php echo $v["name"]; ?></p>
      <p><?php echo $v["indate"]; ?></p>
      <div><?php
      if($v["review"]==1){

      } else if($v["review"]==2) {
        
      } else if($v["review"]==3) {
        
      } else if($v["review"]==4) {
      
      } else {
        
      }
        ?></div>
      <?php echo $v["rate"]; ?>
      <?php echo $v["netabare"]; ?>
      <?php echo $v["review"]; ?>
      </div>
    <?php endforeach;
    }
    ?>
    </div>
  </div>
  <input type="hidden" name="uid" value="<?= $uid; ?>">
  <input type="hidden" name="gid" value="<?= $gid; ?>">
  <input type="hidden" name="title" value="<?= $title; ?>">
  <input type="hidden" name="authors" value="<?= $authors; ?>">
  <input type="hidden" name="publisher" value="<?= $publisher; ?>">
  <input type="hidden" name="publishedDate" value="<?= $publishedDate; ?>">
  <input type="hidden" name="thumbnail" value="<?= $thumbnail; ?>">
  <input type="hidden" name="description" value="<?= $description; ?>">
  <input type="hidden" name="buyLink" value="<?= $buyLink ?>">
  <input type="hidden" name="isbn10" value="<?= $isbn10 ?>">
  <input type="hidden" name="isbn13" value="<?= $isbn13 ?>">
=======
<?php
$displayedReviews = [];
foreach ($vals as $val) {
  // var_dump($val);
  if (in_array($val["review"], $displayedReviews)) {

    continue; // 既に表示されたレビューはスキップ

  }
  

  $displayedReviews[] = $val["review"];
?>
      <div class="detail_sns">
        <h2 class="h2">感想</h2>
        <?php ?>
            <div class="review_box">
            <p><?php echo $val["name"]; ?></p>
            <p><?php echo $val["indate"]; ?></p>
            <div> <?php $rate = $val["rate"]; ?>
              <div class="message_rate home">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                  <span data-value="<?= $i ?>" title="評価:<?= $i ?>" <?php if ($i <= $rate) echo 'class="active"'; ?>></span>
                <?php } ?>
              </div>
              <?php echo $val["review"]; ?>
              <?php echo ($val["netabare"] == 1) ? "<p style='font-size:0.85rem;color:#4260a1;text-align:right'>ネタバレ</p>" : "" ; ?>
            </div>
        
          </div>
      </div>
      <?php }
    ?>
      <input type="hidden" name="uid" value="<?= isset($_POST["uid"]) ? $_POST["uid"] : $val["uid"]; ?>">
      <input type="hidden" name="gid" value="<?= isset($_POST["gid"]) ? $_POST["gid"] : $val["gid"]; ?>">
      <input type="hidden" name="title" value="<?= isset($_POST["title"]) ? $_POST["title"] : $val["title"]; ?>">
      <input type="hidden" name="authors" value="<?= isset($_POST["authors"]) ? $_POST["authors"] : $val["authors"]; ?>">
      <input type="hidden" name="publisher" value="<?= isset($_POST["publisher"]) ? $_POST["publisher"] : $val["publisher"]; ?>">
      <input type="hidden" name="publishedDate" value="<?= isset($_POST["publishedDate"]) ? $_POST["publishedDate"] : $val["publishedDate"]; ?>">
      <input type="hidden" name="thumbnail" value="<?= isset($_POST["thumbnail"]) ? $_POST["thumbnail"] : $val["thumbnail"]; ?>">
      <input type="hidden" name="description" value="<?= isset($_POST["description"]) ? $_POST["description"] : $val["description"]; ?>">
      <input type="hidden" name="buyLink" value="<?= isset($_POST["buyLink"]) ? $_POST["buyLink"] : $val["buyLink"]; ?>">
      <input type="hidden" name="isbn10" value="<?= isset($_POST["isbn10"]) ? $_POST["isbn10"] : $val["isbn10"]; ?>">
      <input type="hidden" name="isbn13" value="<?= isset($_POST["isbn13"]) ? $_POST["isbn13"] : $val["isbn13"]; ?>">
>>>>>>> 3da83af (PHP選手権用提出)
</form>
<?php  ?>
<?php include 'footer.php'; ?>