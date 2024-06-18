<?php
// include("funcs.php");
$uid = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
include 'header.php'; ?>
<form action="search.php" method="post" class="search_box">
  作品名 <input type="text" name="intitle" id="intitle" class="input_text">
  作者名 <input type="text" name="inauthor" id="inauthor" class="input_text">
  <!-- <input type="hidden" name="page" id="page" class="input_text"> -->
  <button type="submit" class="search_btn"><i class="bi bi-search"></i> 検索</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = isset($_POST['intitle']) ? $_POST['intitle'] : "";
  $inauthor = isset($_POST['inauthor']) ? $_POST['inauthor'] : "";
  var_dump($_POST['intitle']);
  var_dump($_POST['inauthor']);
  // $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;

  // 検索条件をセッションに保存
  $_SESSION['search_params'] = [
    'intitle' => $title,
    'inauthor' => $inauthor
    // 'page' => $page
  ];

  // リダイレクト
  header("Location: search.php");
  exit();
}
$startIndex = isset($_GET["startIndex"]) ? (int)$_GET["startIndex"] : 0;
// var_dump($_SESSION['search_params']);
if (isset($_SESSION['search_params'])) {
  $title = $_SESSION['search_params']['intitle'];
  $inauthor = $_SESSION['search_params']['inauthor'];
  // $page = $_SESSION['search_params']['page'];

  // 変数の初期化
  $total_pages = 0;
  $total_count = 0;
  $get_count = 0;

  // APIの基本になるURL
  $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';
  // $key = 'intitle';
  // $base_url .= $key . ':' . $title . '+';
  // 検索条件を配列にする
  $params = array();
  if ($title !== "") {
    $params['intitle'] = $title;  //書籍タイトル
  }
  if ($inauthor !== "") {
    $params['inauthor'] = $inauthor;  //著者
  }
  // var_dump($params);
  // 1ページあたりの取得件数
  $maxResults = 10;
  // $startIndex = isset($startIndex) ? $startIndex : 0;
  // $page = ($startIndex - 1) * $maxResults;
  // ページ番号（1ページ目の情報を取得）
  // $startIndex = 0;  //欲しいページ番号-1 で設定
  // 配列で設定した検索条件をURLに追加
  foreach ($params as $key => $value) {
    $base_url .= $key . ':' . $value . '+';
  }
  // 末尾につく「+」を削除
  $params_url = substr($base_url, 0, -1);
  // 件数情報を設定
  $url = $params_url . '&maxResults=' . $maxResults . '&startIndex=' . $startIndex . '&orderBy=newest'. '&printType=books';
  // 書籍情報を取得
  $json = @file_get_contents($url);
  if ($json === FALSE) {
    echo "<p>データを取得できませんでした。インターネット接続を確認してください。</p>";
  } else {
    $data = json_decode($json);

    if ($data === NULL) {
      echo "<p>データの解析に失敗しました。</p>";
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
      // var_dump($books);
      $i = 1;
      foreach ($books as $book) :
        // var_dump($book);
        // var_dump($book->volumeInfo->industryIdentifiers->identifier);
        $gid = isset($book->id) ? $book->id : "";
        $title = isset($book->volumeInfo->title) ? $book->volumeInfo->title : "";
        $thumbnail = isset($book->volumeInfo->imageLinks->thumbnail) ? $book->volumeInfo->imageLinks->thumbnail : "";
        $publisher = isset($book->volumeInfo->publisher) ? $book->volumeInfo->publisher : "";
        $publishedDate = isset($book->volumeInfo->publishedDate) ? formatDate($book->volumeInfo->publishedDate) : "";
        $description = isset($book->volumeInfo->description) ? $book->volumeInfo->description : "";
        $authors = isset($book->volumeInfo->authors) ? implode(',', $book->volumeInfo->authors) : "";
        $buyLink = isset($book->saleInfo->buyLink) ? $book->saleInfo->buyLink : "";
        $isbn10 = "";
        $isbn13 = "";
        //isbn
        if (isset($book->volumeInfo->industryIdentifiers)) {
          foreach ($book->volumeInfo->industryIdentifiers as $identifier) {
            if ($identifier->type === 'ISBN_10') {
              $isbn10 = $identifier->identifier;
              // var_dump($isbn_10);
            }
            if ($identifier->type === 'ISBN_13') {
              $isbn13 = $identifier->identifier;
              // var_dump($isbn_13);
            }
          }
        }
        // var_dump($buyLink, $thumbnail, $publisher);
        if (!empty($buyLink) && !empty($thumbnail) && !empty($publisher)) {
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
                <input type="hidden" name="uid" value="<?= $uid; ?>">
                <input type="hidden" name="gid" value="<?= $gid; ?>">
                <input type="hidden" name="title" value="<?= $title; ?>">
                <input type="hidden" name="authors" value="<?= $authors; ?>">
                <input type="hidden" name="publisher" value="<?= $publisher; ?>">
                <input type="hidden" name="publishedDate" value="<?= $publishedDate; ?>">
                <input type="hidden" name="thumbnail" value="<?= $thumbnail; ?>">
                <input type="hidden" name="description" value="<?= $description; ?>">
                <input type="hidden" name="get_count" value="<?= $get_count; ?>">
                <input type="hidden" name="buyLink" value="<?= $buyLink ?>">
                <input type="hidden" name="isbn10" value="<?= $isbn10 ?>">
                <input type="hidden" name="isbn13" value="<?= $isbn13 ?>">
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
} ?>

<script>
  $(document).ready(function() {
    let index = get_startIndex();
    $(".pagenation a").eq(index).addClass("active");

    function get_startIndex() {
      let queryString = window.location.search;
      let urlParams = new URLSearchParams(queryString);
      let startIndex = urlParams.get('startIndex');
      return startIndex;
    }
    $(".books_item_btn").click(function(e) {
      // alert("押した");
      e.preventDefault();
      $(this).closest('.detail_box').submit();
    });
  });
</script>
<?php
include 'footer.php'; ?>