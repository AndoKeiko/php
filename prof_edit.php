<?php
<<<<<<< HEAD
session_start();
$uid = $_SESSION["id"];
include 'header.php'; ?>
<form action="index.php" method="post" class="search_box">
  作品名 <input type="text" name="intitle" class="input_text">
  <button type="submit" class="search_btn"><i class="bi bi-search"></i> 検索</button>
  <!-- タイトル<input type="text" name="inauthor"> -->
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['intitle'];

  // APIの基本になるURL
  $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';
  $key = 'intitle';
  $base_url .= $key . ':' . $title . '+';

  // 検索条件を配列にする
  // $params = array(
  //   'intitle'  => $title,  //書籍タイトル
  //   // 'inauthor' => '仲村佳樹',       //著者
  // );

  // 1ページあたりの取得件数
  $maxResults = 10;

  // ページ番号（1ページ目の情報を取得）
  $startIndex = 0;  //欲しいページ番号-1 で設定

  //ソート順
  $sort = 'newest';



  // 配列で設定した検索条件をURLに追加
  // foreach ($params as $key => $value) {
  //   $base_url .= $key . ':' . $value . '+';
  // }

  // 末尾につく「+」をいったん削除
  $params_url = substr($base_url, 0, -1);

  // 件数情報を設定
  $url = $params_url . '&maxResults=' . $maxResults . '&startIndex=' . $startIndex . '&orderBy=' . $sort;

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
      // ここに続く処理
    }
  }
?>


  <script>
    let i = 1;
  </script>
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
        // タイトル
        if (isset($book->id)) {
          $gid = $book->id;
        } else {
          $gid = "-";
        }

        // タイトル
        if (isset($book->volumeInfo->title)) {
          $title = $book->volumeInfo->title;
        } else {
          $title = "-";
        }
        // サムネ画像
        if (isset($book->volumeInfo->imageLinks->thumbnail)) {
          $thumbnail = $book->volumeInfo->imageLinks->thumbnail;
        } else {
          $thumbnail = "";
        }
        // 出版社
        if (isset($book->volumeInfo->publisher)) {
          $publisher = $book->volumeInfo->publisher;
        } else {
          $publisher = "";
        }
        // 出版日
        if (isset($book->volumeInfo->publishedDate)) {
          $publishedDate = $book->volumeInfo->publishedDate;
        } else {
          $publishedDate = "-";
        }
        // 説明
        if (isset($book->volumeInfo->description)) {
          $description = $book->volumeInfo->description;
        } else {
          $description = "";
        }
        // 著者（配列なのでカンマ区切りに変更）
        if (isset($book->volumeInfo->authors)) {
          $authors = implode(',', $book->volumeInfo->authors);
        } else {
          $authors = "-";
        }
        // 巻
        if (isset($book->volumeInfo->orderNumber)) {
          $orderNumber = implode(',', $book->volumeInfo->orderNumber);
        } else {
          $orderNumber = "-";
        }
        //購入ページ
        if (isset($book->saleInfo->buyLink)) {
          $buyLink = $book->saleInfo->buyLink;
        } else {
          $buyLink = "-";
        }
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
        // if (isset($book->volumeInfo->industryIdentifiers)) {
        //   $isbn_10 = isset($book->volumeInfo->industryIdentifiers[0]) ? $book->volumeInfo->industryIdentifiers[0]->identifier : "-";
        //   $isbn_13 = isset($book->volumeInfo->industryIdentifiers[1]) ? $book->volumeInfo->industryIdentifiers[1]->identifier : "-";
        //   var_dump($isbn_10);
        // } else {
        //   $isbn_10 = "-";
        //   $isbn_13 = "-";
        // }
        if ($buyLink) {
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

      <!-- ./loop_books -->

      <!-- 書籍情報が取得されていない場合 -->
    <?php else : ?>
      <p>情報が有りません</p>

  <?php endif;
} ?>
    </div>
    <script>
      $(document).ready(function() {
        $(".books_item_btn").click(function(e) {
          // alert("押した");
          e.preventDefault();
          $(this).closest('.detail_box').submit();
        });
      });
    </script>
    <?php include 'footer.php'; ?>
=======
include 'header.php';
// include "funcs.php";
//2. DB接続します
$pdo = db_conn();


// $sql = "SELECT * FROM user_table
// WHERE user_table.id = :uid";
$sql = "SELECT 
user_table.id AS user_id, 
user_table.name AS user_name,
user_table.img AS user_img,  
user_table.lid AS user_lid, 
prof_table.nickname AS prof_nickname, 
prof_table.prof_img AS prof_img,
prof_table.prof_text AS prof_text, 
prof_table.prof_gender AS prof_gender, 
prof_table.gender_pub AS prof_gender_pub, 
prof_table.birthday AS prof_birthday, 
prof_table.birthday_pub AS prof_birthday_pub, 
prof_table.web AS prof_web,
prof_table.prefecture AS prof_prefecture,
prof_table.fab_janle AS prof_fab_janle,
prof_table.fab_auth AS prof_fab_auth,
prof_table.best_3 AS prof_best_3
FROM user_table
LEFT JOIN prof_table ON prof_table.uid = user_table.id
WHERE user_table.id = :uid";

// $sql = "SELECT user_table.*,prof_table.* FROM user_table
// LEFT JOIN prof_table ON prof_table.uid = user_table.id
// WHERE user_table.id = :uid";
// $sql = "SELECT user_table.*,prof_table.* FROM user_table
// LEFT JOIN prof_table ON prof_table.uid = user_table.id
// WHERE user_table.id = :uid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

//4. 抽出データ数を取得
$vals = $stmt->fetch();
//  var_dump($vals);
//  var_dump($vals['user_id']);
?>

<p class="h2 w40"><img src='<?= isset($vals['prof_img']) ? $vals['prof_img'] : $header_img; ?>' width="60" height="60">
 <?= ($vals["prof_nickname"] == "") ? $vals["user_name"] : $vals["prof_nickname"]; ?>さんのプロフィールの設定</p>
<form action="prof_insert.php" method="POST" id="edit_insert" class="edit_insert" enctype="multipart/form-data">
  <dl>
    <dt>本箱ID</dt>
    <dd><input type="text" name="lid" id="lid" class="input_text" value="<?= $vals['user_lid'] !== NULL ? $vals['user_lid'] : ''; ?>"></dd>
    <dt>ニックネーム</dt>
    <dd><input type="text" name="nickname" id="nickname" class="input_text" value="<?= isset($vals['prof_nickname']) ? $vals['prof_nickname'] : ''; ?>"></dd>
    <!-- 画像アップロード -->
    <dt>プロフィール画像</dt>
    <dd>
      <input type="file" accept="image/*" capture="camera" id="upfile" name="upfile"><img src="<?= isset($vals['prof_img']) ? $vals['prof_img'] : $header_img; ?>" id="prof_img_ex" width="50" height="50">
      <input type="hidden" name="current_prof_img" value="<?= isset($vals['prof_img']) ? $vals['prof_img'] : ''; ?>">
    <dt>自己紹介</dt>
    <dd><textarea type="text" name="prof_text" id="prof_text" class="input_text"><?= ($vals['prof_text']!="") ? $vals['prof_text'] : ''; ?></textarea></dd>
    <dt>性別</dt>
    <dd>
      <?php
      $options = [
        1 => '選択してください',
        2 => '男',
        3 => '女'
      ];
      $selectedValue = ($vals['prof_gender']=="") ?  1 : $vals['prof_gender'];
      echo '<select name="prof_gender" id="prof_gender" class="input_select input_text">';
      foreach ($options as $key => $value) {
        $selected = ($key == $selectedValue) ? "selected" : "";
        echo "<option value='{$key}' {$selected}>{$value}</option>";
      }
      echo '</select>';
      ?>

      <div class="valuation_column">
        <?php
        $checked = (!isset($vals['gender_pub']) && isset($vals['gender_pub']) == 1) ? "checked" : ""; ?>
        <input type="checkbox" name="gender_pub" id="gender_pub" <?= $checked ?>>
        <label for="publicationStatus">非公開で登録</label>
      </div>
    </dd>
    <dt>誕生日</dt>
    <dd>
      <input type="date" name="birthday" id="birthday" class="input_text" value="<?= ($vals['prof_birthday']!="") ? $vals['prof_birthday'] : ''; ?>">
      <div class="valuation_column">
        <?php
        $checked = (isset($vals['birthday_pub']) && $vals['birthday_pub'] == 1) ? "checked" : ""; ?>
        <input type="checkbox" name="birthday_pub" id="birthday_pub" <?= $checked ?>>
        <label for="publicationStatus">非公開で登録</label>
      </div>
    </dd>
    <dt>WEBサイト</dt>
    <dd><textarea type="text" name="web" id="web" class="input_text"><?= isset($vals['prof_web']) ? $vals['prof_web'] : ''; ?></textarea></dd>
    <dt>都道府県</dt>
    <dd>
      <?php
      $prefecture = array(
        0 => "選択してください",
        1 => "北海道",
        2 => "青森県",
        3 => "岩手県",
        4 => "宮城県",
        5 => "秋田県",
        6 => "山形県",
        7 => "福島県",
        8 => "茨城県",
        9 => "栃木県",
        10 => "群馬県",
        11 => "埼玉県",
        12 => "千葉県",
        13 => "東京都",
        14 => "神奈川県",
        15 => "新潟県",
        16 => "富山県",
        17 => "石川県",
        18 => "福井県",
        19 => "山梨県",
        20 => "長野県",
        21 => "岐阜県",
        22 => "静岡県",
        23 => "愛知県",
        24 => "三重県",
        25 => "滋賀県",
        26 => "京都府",
        27 => "大阪府",
        28 => "兵庫県",
        29 => "奈良県",
        30 => "和歌山県",
        31 => "鳥取県",
        32 => "島根県",
        33 => "岡山県",
        34 => "広島県",
        35 => "山口県",
        36 => "徳島県",
        37 => "香川県",
        38 => "愛媛県",
        39 => "高知県",
        40 => "福岡県",
        41 => "佐賀県",
        42 => "長崎県",
        43 => "熊本県",
        44 => "大分県",
        45 => "宮崎県",
        46 => "鹿児島県",
        47 => "沖縄県"
      );
      // echo $prefecture_string;
      ?>
      <select name="prefecture" id="prefecture" class="input_select input_text">
        <?php
        foreach ($prefecture as $key => $ps) {
          $selected = (isset($vals['prof_prefecture']) && $vals['prof_prefecture'] == $key) ? "selected" : "";
          echo "<option value='{$key}' {$selected}>{$ps}</option>";
        }
        ?>
      </select>
    </dd>
    <dt>好きなジャンル（スペース区切りで複数記載可）</dt>
    <dd><textarea type="text" name="fab_janle" id="fab_janle" class="input_text" placeholder="スペース区切りで複数記載可"><?= isset($vals['prof_fab_janle']) ? $vals['prof_fab_janle'] : ''; ?></textarea></dd>
    <dt>好きな作家（スペース区切りで複数記載可）</dt>
    <dd><textarea type="text" name="fab_auth" id="fab_auth" class="input_text" placeholder="スペース区切りで複数記載可"><?= isset($vals['prof_fab_auth']) ? $vals['prof_fab_auth'] : ''; ?></textarea></dd>
  </dl>
  <input type="hidden" name="uid" value="<?= ($vals['user_id']!="") ? $vals['user_id'] : $uid; ?>">
  <button type="submit" class="submit_btn">プロフィール更新</button>
</form>
<?php

?>
<script>
  $('#upfile').on("change", function(e){
    let file = event.target.files[0];
    if (!file) return;
    let reader = new FileReader();
    reader.onload = function(event) {
        $('#prof_img_ex').attr('src', event.target.result).show();
    }
    reader.readAsDataURL(file);
  });
</script>
<?php include 'footer.php'; ?>
>>>>>>> 3da83af (PHP選手権用提出)
