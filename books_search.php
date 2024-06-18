<?php
session_start();
// header('Content-Type: application/json');
// include 'header.php';
$total_pages = 0;
$total_count = 0;
$get_count = 0;
$title = isset($_POST['intitle']) ? $_POST['intitle'] : "";
$base_url = 'https://www.googleapis.com/books/v1/volumes?q=';
$params = array();
if ($title !== "") {
  $params['intitle'] = $title;
}
$maxResults = 10;
foreach ($params as $key => $value) {
  $base_url .= $key . ':' . $value . '+';
}
$params_url = substr($base_url, 0, -1);
$startIndex = isset($_GET["startIndex"]) ? (int)$_GET["startIndex"] : 0;
$url = $params_url . '&maxResults=' . $maxResults . '&startIndex=' . $startIndex . '&orderBy=newest';
$json = @file_get_contents($url);
if ($json === FALSE) {
  echo "<p>データを取得できませんでした。インターネット接続を確認してください。</p>";
  $books = [];
} else {
  $data = json_decode($json);
  if ($data === NULL) {
    echo "<p>データの解析に失敗しました。</p>";
    $books = [];
  } else {
    $total_count = $data->totalItems;
    $books = isset($data->items) ? $data->items : [];
    $get_count = count($books);
    $total_pages = ceil($total_count / $maxResults);
  }
}
?>
<p class="mb-5">全<?php echo $total_count; ?>件中、<?php echo $get_count; ?>件を表示中</p>
<!-- 1件以上取得した書籍情報がある場合 -->
<?php if ($get_count > 0) : ?>

  <div class="loop_books index">

    <!-- 取得した書籍情報を順に表示 -->
    <?php
    var_dump($books);
    echo json_encode($books);
    $i = 1;
    echo json_encode($books);
    foreach ($books as $book) :
      var_dump($book);
      // var_dump($book->volumeInfo->industryIdentifiers->identifier);
      $gid = isset($book->id) ? $book->id : "";
      $title = isset($book->volumeInfo->title) ? $book->volumeInfo->title : "";
      $thumbnail = isset($book->volumeInfo->imageLinks->thumbnail) ? $book->volumeInfo->imageLinks->thumbnail : "";
      // $publisher = isset($book->volumeInfo->publisher) ? $book->volumeInfo->publisher : "";
      // $publishedDate = isset($book->volumeInfo->publishedDate) ? formatDate($book->volumeInfo->publishedDate) : "";
      // $description = isset($book->volumeInfo->description) ? $book->volumeInfo->description : "";
      $authors = isset($book->volumeInfo->authors) ? implode(',', $book->volumeInfo->authors) : "";
      // $buyLink = isset($book->saleInfo->buyLink) ? $book->saleInfo->buyLink : "";
      //isbn
      if ($title != "" || $thumbnail != "" || $thumbnail != "") {
    ?>
        <form action="./detail.php" method="POST" id="detail_box[<?= $i ?>]" class="detail_box">
          <div class="loop_books_item">
            <!-- <label for="books_item[<?= $i ?>]">
              <input type="checkbox" name="book_select[<?= $i ?>]" class="books_item" id="books_item[<?= $i ?>]"> -->
            <a href="detail.php" class="books_item_btn" id="books_item_btn[<?= $i ?>]">
              <figure>
                <img src="<?= $thumbnail; ?>" alt="<?= $title; ?>">
              </figure>
              <div class="books_item_text">
                <p class="book_item_title">
                  『<?= $title; ?>』</p>
                <p class="book_item_authors">著者：<?= $authors; ?></p>
                <p class="book_item_authors"><?= $publisher; ?>(<?= $publishedDate; ?>発売)</p>
              </div>
              <!-- <input type="hidden" name="uid" value="<?= $uid; ?>"> -->
              <input type="hidden" name="gid" value="<?= $gid; ?>">
              <input type="hidden" name="title" value="<?= $title; ?>">
              <input type="hidden" name="authors" value="<?= $authors; ?>">
              <!-- <input type="hidden" name="publisher" value="<?= $publisher; ?>"> -->
              <!-- <input type="hidden" name="publishedDate" value="<?= $publishedDate; ?>"> -->
              <input type="hidden" name="thumbnail" value="<?= $thumbnail; ?>">
              <!-- <input type="hidden" name="description" value="<?= $description; ?>"> -->
              <input type="hidden" name="get_count" value="<?= $get_count; ?>">
              <!-- <input type="hidden" name="buyLink" value="<?= $buyLink ?>"> -->
              <!-- <input type="hidden" name="isbn10" value="<?= $isbn10 ?>"> -->
              <!-- <input type="hidden" name="isbn13" value="<?= $isbn13 ?>"> -->
            </a>
            <!-- </label> -->
          </div>
        </form>

    <?php
      }
      $i++;
    endforeach; ?>
  </div>
  <!-- ./loop_books -->
  <div class="pagenation">
    <?php if ($startIndex > 1) : ?>
      <a href="?startIndex=<?= $startIndex - 1 ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
      <a href="?startIndex=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($startIndex < $total_pages) : ?>
      <a href="?startIndex=<?= $startIndex + 1 ?>">Next</a>
    <?php endif; ?>
  </div>

  <!-- 書籍情報が取得されていない場合 -->
<?php else : ?>
  <p>情報が有りません</p>

<?php endif;

?>

?>
</div>

<script>

</script>
<?php include 'footer.php'; ?>