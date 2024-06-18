<?php
session_start();
$uid = $_POST["uid"];
$bid = $_POST["bid"];
$authors = $_POST["authors"];
$publisher = $_POST["publisher"];
$publishedDate = $_POST["publishedDate"];
$title = $_POST["title"];
$thumbnail = $_POST["thumbnail"];
$description = $_POST["description"];
// $get_count = $_POST["get_count"];
$buyLink = $_POST["buyLink"];
$isbn = $_POST["isbn"];
?>
<?php include 'header.php'; ?>

<form action="./book_shelf_detail_insert.php" method="post" id="booklist_form" class="booklist_form">
  <div class="detail_box">
    <div class="detail_left">
      <p class="book_item_img"><img src="<?= $thumbnail; ?>"></p>
    </div>
    <div class="detail_right">
      <h2 class="bookitem_title"><?= $title; ?><span>(<?= $publisher; ?>)</span></h2>
      <p class="bookitem_authors">著者: <?= $authors; ?></p>
      <p class="bookitem_publisher"><?= $publisher; ?> (<?= $publishedDate; ?>発売)</p>
      <p class="book_item_description"><?= $description; ?></p>
      <ul class="book_btn">
        <li class="book_btn_item"><button type="submit"><i class="bi bi-plus-circle"></i> 本箱に入れる</button></li>
        <li class="book_btn_item"><a href="<?= $buyLink ?>" target="_blank">購入する</a></li>
      </ul>

    </div>
    <div class="detail_sns">

    </div>
  </div>
  <input type="hidden" name="uid" value="<?= $uid; ?>">
  <input type="hidden" name="bid" value="<?= $bid; ?>">
  <input type="hidden" name="title" value="<?= $title; ?>">
  <input type="hidden" name="authors" value="<?= $authors; ?>">
  <input type="hidden" name="publisher" value="<?= $publisher; ?>">
  <input type="hidden" name="publishedDate" value="<?= $publishedDate; ?>">
  <input type="hidden" name="thumbnail" value="<?= $thumbnail; ?>">
  <input type="hidden" name="description" value="<?= $description; ?>">
  <!-- <input type="hidden" name="get_count" value="<?= $get_count; ?>"> -->
  <input type="hidden" name="buyLink" value="<?= $buyLink ?>">
  <input type="hidden" name="isbn" value="<?= $isbn ?>">
</form>
<?php  ?>
<?php include 'footer.php'; ?>