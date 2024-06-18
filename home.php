<?php
<<<<<<< HEAD
session_start();
$uid = $_SESSION["id"];
include 'header.php';
include "funcs.php";
//2. DB接続します
$pdo = db_conn();

=======

// $uid = $_SESSION["id"];
include 'header.php';
$uid = isset($_SESSION["uid"]) ? $_SESSION["uid"] : '0';
// var_dump($uid);
// include "funcs.php";
//2. DB接続します
$pdo = db_conn();
>>>>>>> 3da83af (PHP選手権用提出)
$sql = "SELECT review_table.*, user_table.*,book_table.* FROM review_table
INNER JOIN user_table ON review_table.uid = user_table.id
INNER JOIN book_table ON review_table.bid = book_table.bid
WHERE user_table.id = :uid
ORDER BY review_table.indate ASC";
<<<<<<< HEAD
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$stmt->execute();
=======
// $sql = "SELECT
//           prof_table.uid,prof_table.nickname,prof_table.prof_img,
//           user_table.id,
//           review_table.review,review_table.status,review_table.rate,
//           book_table.*
//         FROM user_table
//         JOIN prof_table ON prof_table.uid = user_table.id
//         JOIN review_table ON review_table.uid = user_table.id
//         JOIN book_table ON book_table.uid = user_table.id
//         WHERE prof_table.uid = :uid
//         GROUP BY book_table.gid";
//  $sql = "SELECT DISTINCT
//           prof_table.nickname,prof_table.prof_img,
//           user_table.id,
//           review_table.status,review_table.status,
//           book_table.publisher, book_table.publishedDate, book_table.thumbnail, book_table.gid, book_table.uid, book_table.bid, book_table.title
//         FROM user_table
//         LEFT JOIN prof_table ON prof_table.uid = user_table.id
//         LEFT JOIN review_table ON review_table.uid = user_table.id
//         LEFT JOIN book_table ON book_table.uid = user_table.id
//         WHERE user_table.id = :uid";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}
>>>>>>> 3da83af (PHP選手権用提出)

//4. 抽出データ数を取得
$vals = $stmt->fetchAll();
// var_dump($vals);
$status1 = 0;
$status2 = 0;
$status3 = 0;
$status4 = 0;

<<<<<<< HEAD
if ($vals) {
?>
  <p class="h2"><img src="<?= $vals[0]["img"]; ?>" width="60px" height="60px"> <?= $vals[0]["name"]; ?>さんのプロフィール</p>
  <ul class="home_nav">
    <li class="unav_item"><a href="./book_shelf.php"><i class="bi bi-bookshelf"></i>本棚</a></li>
    <li class="unav_item"><a href="./prof_edit.php"><i class="bi bi-person-fill"></i>プロフィール</a></li>
    <li class="unav_item prof"></li>
  </ul>
  <h3 class="status_h3">読者状況</h3>
  <div class="home_booklist">
    <?php
    foreach ($vals as $val) { ?>
      <?php if ($val["status"] == 1) { ?>
        <?php $status1++; ?>
      <?php  } elseif ($val["status"] == 2) { ?>
        <?php $status2++; ?>
      <?php  } elseif ($val["status"] == 3) { ?>
        <?php $status3++; ?>
      <?php  } elseif ($val["status"] == 4) { ?>
        <?php $status4++; ?>
    <?php }
    } 
    $status_word= ["読みたい", "今読んでいる", "積読", "ヘビロテ"];
    $status_counts = [$status1, $status2, $status3, $status4];
    for($i=0; $i<4; $i++){
      echo "<div class='home_booklist_img'>";
      echo "<h4 class='status_h4'>".$status_word[$i]."(".$status_counts[$i]."件)</h4>";
      echo "<ul class='home_booklist_item_ul'>";
      foreach ($vals as $val) {
        if ($val["status"] == $i+1) {
        echo "<li><img src='". $val["thumbnail"]."' alt='".$val["title"]."' width='80'></li>";
       }
      }
      echo "</ul></div>";
    }?>   
      </ul>

  </div>
  <p class="h2"><img src="<?= $vals[0]["img"]; ?>" width="60px" height="60px"> <?= $vals[0]["name"]; ?>さんのレビュー</p>
  <?php foreach ($vals as $v) : ?>
    <div class="home_review_box">
    <div class="home_review_img"><img src="<?=$v["thumbnail"]?>" alt="<?=$v["title"]?>" width='80'></div>
    <div class="home_review_text">
    <p class="font-bold"><?= $v["title"] ?></p>
    
    <?php $rate = $v["rate"]; ?>
    <div class="message_rate home">
    <?php for($i=1; $i<=5; $i++){ ?>
      <span data-value="<?=$i?>" title="評価:<?=$i?>" <?php if($i <= $rate) echo 'class="active"'; ?>></span>
    <?php } ?>

      <input type="hidden" name="reviewRate" id="reviewRate">
    </div>
    <p class="w-full"><?= $v["review"] ?></p>
    </div>
    </div>
<?php
  endforeach;
}
=======

  //  var_dump($header_img .",". $header_name .",". $header_prof_img .",". $header_nickname); 
?>
<div class="prof_name">
<p class="h2 home"><img src='<?php echo ($header_prof_img == "") ? $header_img : $header_prof_img; ?>' width="60" height="60">  <?= isset($header_name) ? $header_name : $header_name; ?>さんのプロフィール</p>
  <ul class="home_nav">
    <li class="unav_item"><a href="./book_shelf.php"><i class="bi bi-bookshelf"></i>本棚</a></li>
    <li class="unav_item"><a href="./prof.php"><i class="bi bi-person-fill"></i>プロフィール</a></li>
    <li class="unav_item prof"></li>
  </ul></div>
  <h3 class="status_h3">読者状況</h3>
  <div class="home_booklist">
    <?php
    foreach ($vals as $val) {
      // var_dump($val["status"]);
    ?>
      <?php 
      if ($val["status"] == 1) { ?>
        <?php $status1++;
        continue; ?>
      <?php  } elseif ($val["status"] == 2) { ?>
        <?php $status2++;
        continue; ?>
      <?php  } elseif ($val["status"] == 3) { ?>
        <?php $status3++;
        continue; ?>
      <?php  } elseif ($val["status"] == 4) { ?>
        <?php $status4++;
        continue; ?>
    <?php }
    }
    $status_word = ["読みたい", "今読んでいる", "積読", "読了"];
    $status_counts = [$status1, $status2, $status3, $status4];
    for ($i = 0; $i < 4; $i++) {
      echo "<div class='home_booklist_img'>";
      echo "<h4 class='status_h4'>" . $status_word[$i] . "(" . $status_counts[$i] . "件)</h4>";
      echo "<ul class='home_booklist_item_ul'>";
      foreach ($vals as $val) {
        if ($val["status"] == $i + 1) {
          echo "<li><a href='./detail.php?gid={$val['gid']}&uid={$val['uid']}&bid={$val['bid']}&home_flg=1'><img src='{$val["thumbnail"]}' alt='{$val["title"]}' width='80'></a></li>";
        }
      }
      echo "</ul></div>";
    }
    ?>
    <!-- </ul> -->

  </div>
<?php
// if ($v["review"]) { 
  ?>  
<p class="h2"><img src='<?php echo ($header_prof_img == "") ? $header_img : $header_prof_img; ?>' width="60" height="60">  <?= isset($header_name) ? $header_name : $header_name; ?>さんの感想</p>
  <?php foreach ($vals as $v) : ?>
    <div class="home_review_box">
      <div class="home_review_img"><img src="<?= $v["thumbnail"] ?>" alt="<?= $v["title"] ?>" width='80'></div>
      <div class="home_review_text">
        <h3 class="home_review_text_h3"><a href='./detail.php?gid=<?= $v['gid'] ?>&uid=<?= $v['uid'] ?>&bid=<?= $v['bid'] ?>&home_flg=1'><?= $v["title"] ?></a></h3>

        <?php $rate = $v["rate"]; ?>
        <div class="message_rate home">
          <?php for ($i = 1; $i <= 5; $i++) { ?>
            <span data-value="<?= $i ?>" title="評価:<?= $i ?>" <?php if ($i <= $rate) echo 'class="active"'; ?>></span>
          <?php } ?>

          <input type="hidden" name="reviewRate" id="reviewRate">
        </div>
        <p class="w-full"><?= $v["review"] ?></p>
      </div>
    </div>
<?php
  endforeach;
// }

>>>>>>> 3da83af (PHP選手権用提出)
?>
<script>
  $('.message_rate span').on('click', function() {
    selectedRating = parseInt($(this).attr('data-value'), 10);
    console.log("選択された評価: " + selectedRating);
    $(this).closest('.message_rate').find('#reviewRate').val(selectedRating);
    $('.message_rate span').removeClass('active');
    $('.message_rate span').each(function() {
      if (parseInt($(this).attr('data-value'), 10) <= selectedRating) {
        $(this).addClass('active');
      }
    });

  });
</script>
<?php include 'footer.php'; ?>