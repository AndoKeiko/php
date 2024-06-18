<?php
<<<<<<< HEAD
session_start();
$uid = isset($_SESSION["uid"]) ? $_SESSION["uid"] : null;
$title = isset($_SESSION["title"]) ? $_SESSION["title"] : '';
$authors = isset($_SESSION["authors"]) ? $_SESSION["authors"] : '';
$publisher = isset($_SESSION["publisher"]) ? $_SESSION["publisher"] : '';
$publishedDate = isset($_SESSION["publishedDate"]) ? $_SESSION["publishedDate"] : '';
$thumbnail = isset($_SESSION["thumbnail"]) ? $_SESSION["thumbnail"] : '';
$description = isset($_SESSION["description"]) ? $_SESSION["description"] : '';
$buyLink = isset($_SESSION["buyLink"]) ? $_SESSION["buyLink"] : '';
$isbn10 = isset($_SESSION["isbn10"]) ? $_SESSION["isbn10"] : '';
$isbn13 = isset($_SESSION["isbn13"]) ? $_SESSION["isbn13"] : '';
// var_dump($uid);
//1.  DB接続します
include "funcs.php";
=======
//1.  DB接続します
include "header.php";

$title = isset($_SESSION["title"]) ? $_SESSION["title"] : $_POST["title"];
$authors = isset($_SESSION["authors"]) ? $_SESSION["authors"] : $_POST["authors"];
$publisher = isset($_SESSION["publisher"]) ? $_SESSION["publisher"] : $_POST["publisher"];
$publishedDate = isset($_SESSION["publishedDate"]) ? $_SESSION["publishedDate"] : $_POST["publishedDate"];
$thumbnail = isset($_SESSION["thumbnail"]) ? $_SESSION["thumbnail"] : $_POST["thumbnail"];
$description = isset($_SESSION["description"]) ? $_SESSION["description"] : $_POST["description"];
$buyLink = isset($_SESSION["buyLink"]) ? $_SESSION["buyLink"] : $_POST["buyLink"];
$isbn10 = isset($_SESSION["isbn10"]) ? $_SESSION["isbn10"] : $_POST["isbn10"];
$isbn13 = isset($_SESSION["isbn13"]) ? $_SESSION["isbn13"] : $_POST["isbn13"];
$uid = isset($_SESSION["uid"]) ? $_SESSION["uid"] : $_POST["uid"];

>>>>>>> 3da83af (PHP選手権用提出)
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT user_table.*,book_table.* FROM book_table INNER JOIN user_table ON book_table.uid = user_table.id WHERE uid=:uid"); // prepareメソッドを呼び出し
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT); // bindValueメソッドを呼び出し
$status = $stmt->execute();
if ($status == false) {
  sql_error($stmt);
}
$values = $stmt->fetchAll(PDO::FETCH_ASSOC);
<<<<<<< HEAD
// var_dump($values);
?>
<?php include 'header.php'; ?>
=======
// var_dump($var_dump($v));
?>

>>>>>>> 3da83af (PHP選手権用提出)
<?php
if (isset($_SESSION['error'])) :
  echo "<p class='error'>" . $_SESSION['error'] . "</p>";
  unset($_SESSION['error']);
endif;
?>
<div class="loop_books book_shelf">
  <div class="cate_plus_wrap">
    <div class="cate_plus_wrap_inner">
      <form action="./category_insert.php" method="post" name="cate_plus_form">
        <div class="cate_title">カテゴリー追加</div>
        <input type="text" name="cate_name" id="cate_name" class="cate_name">
        <input type="hidden" name="uid" value="<?= $uid ?>">
        <div class="cate_plus_btn_box">
          <button type="submit" class="ok_btn">OK</button>
          <button type="button" id="cancel_btn" class="cancel_btn">キャンセル</button>
        </div>
      </form>
    </div>
  </div>
  <?php
  $i = 1; ?>
<<<<<<< HEAD
<?php if (!empty($values)) : ?>
  <p class="h2"><?= $values[0]["name"]; ?>さんの本棚</p>
  <?php foreach ($values as $v) : ?>
    
    <div class="loop_books_item">
      <div class="books_item_btn" id="books_item_btn[<?= $i ?>]">
        <figure>
          <img src="<?= $v['thumbnail'] ?>" alt="<?= $v['title'] ?>">
        </figure>
      </div>
      <div id="popup-wrapper[<?= $i ?>]" class="popup-wrapper">
        <form action="book_shelf_insert.php" method="POST" id="detail_box[<?= $i ?>]" class="detail_box">
          <div id="popup-inside[<?= $i ?>]" class="popup-inside">
            <div id="popup-close[<?= $i ?>]" class="popup-close"><?= $v['title'] ?> <span>×</span></div>
            <div id="message[<?= $i ?>]" class="message">
              <div class="message_top_box">
                <div class="message_top_left"><img src="<?= $v['thumbnail'] ?>"></div>
                <div class="message_top_right">
                  <h2><?= $v['title'] ?></h2>
                  <p><?= $v['publisher'] ?> / <?= $v['publishedDate'] ?></p>

                  <div class="btn_box">
                    <p class="shop_btn"><a href="<?= $v['buyLink'] ?>">購入する</a></p>
                    <div class="shop_btn02">
                      <a href="edit.php?bid=<?= $v['bid'] ?>">詳細編集</a>
                      <a href="book_shelf_delete.php?bid=<?= $v['bid'] ?>">削除</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="message_middle_box">
                <dl class="valuation_box">
                  <dt class="valuation_title">読書状況</dt>
                  <dd class="valuation_column">
                    <input id="readingStatus1" type="radio" name="readingStatus" value="0" checked>
                    <label for="readingStatus1">未設定</label>

                    <input id="readingStatus2" type="radio" name="readingStatus" value="1">
                    <label for="readingStatus2">読みたい</label>

                    <input id="readingStatus3" type="radio" name="readingStatus" value="2">
                    <label for="readingStatus3">今読んでいる</label>

                    <input id="readingStatus4" type="radio" name="readingStatus" value="3">
                    <label for="readingStatus4">積読</label>

                    <input id="readingStatus5" type="radio" name="readingStatus" value="4">
                    <label for="readingStatus5">ヘビロテ</label>

                  </dd>
                </dl>
                <dl class="">
                  <?php
                  //1.  DB接続します
                  $pdo = db_conn();

                  //2. データ登録SQL作成
                  $stmt = $pdo->prepare("SELECT * FROM book_category WHERE uid=:uid"); // prepareメソッドを呼び出し
                  $stmt->bindValue(':uid', $uid, PDO::PARAM_STR); // bindValueメソッドを呼び出し
                  $status = $stmt->execute();
                  //3. SQL実行時にエラーがある場合STOP
                  if ($status == false) {
                    sql_error($stmt);
                  } ?>
                  <dt class="valuation_title">カテゴリー</dt>
                  <dd class="valuation_column">
                    <select name="category_list" id="category_list" class="category_list">
                      <?php
                      $values02 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      if (!$values02) { ?>
                        <option value="">未設定</option>
                      <?php } else { ?>
                        <option value="">選択してください</option>
                        <?php foreach ($values02 as $v02) :
                          //4. 抽出データ数を取得 
                        ?>
                          <option value="<?= $v02['uid'] ?>"><?= $v02['cname'] ?></option>
                      <?php
                        endforeach;
                      } ?>
                    </select>
                    <p id="cate_plus_btn" class="cate_plus_btn"><i class="bi bi-plus-circle"></i>　追加</p>
                  </dd>
                </dl>
                <dl class="">
                  <dt class="valuation_title">タグ</dt>
                  <dd class="valuation_column"><textarea name="valuation_tag" id="valuation_tag" placeholder="タグはスペース区切りで複数入力できます"></textarea></dd>
                </dl>
                <dl class="">
                  <dt class="valuation_title">公開状況</dt>
                  <dd class="valuation_column">
                    <input type="checkbox" name="publicationStatus" id="publicationStatus">
                    <label for="publicationStatus">非公開で登録</label>
                  </dd>
                </dl>
              </div>
              <div class="message_bottom_box">
                <div class="message_rate">
                  <span data-value="5" title="評価:5"></span>
                  <span data-value="4" title="評価:4"></span>
                  <span data-value="3" title="評価:3"></span>
                  <span data-value="2" title="評価:2"></span>
                  <span data-value="1" title="評価:1"></span>
                  <input type="hidden" name="reviewRate" id="reviewRate">
                </div>
                <textarea name="message_review" class="message_review" placeholder="入力のヒント"></textarea>
                <label for=""><input type="checkbox" name="netabare" id="netabare">ネタバレを含む</label>
                <input type="hidden" name="uid" value="<?= $uid ?>">
                <input type="hidden" name="gid" value="<?= $gid ?>">
                <input type="hidden" name="bid" value="<?= $v['bid'] ?>">
                <input type="submit" class="save_btn" value="レビューを保存">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

  <?php
    $i++;
  endforeach;
  ?>
  <?php else : ?>
  <p class="h2">本棚が空です。</p>
<?php endif; ?>
=======
  <?php if (!empty($values)) : ?>
    <p class="h2"><img src='<?php echo ($header_prof_img == "") ? $header_img : $header_prof_img; ?>' width="60" height="60"><?= isset($header_nickname) ? $header_name : $header_nickname; ?>さんの本棚</p>
    <?php foreach ($values as $v) :
      // var_dump($v);
      $pdo = db_conn();
      //2. データ登録SQL作成
      //   $stmt = $pdo->prepare("SELECT user_table.id,book_table.gid,review_table.rid,review_table.uid,review_table.bid,review_table.cid,review_table.tag,review_table.status,review_table.review,review_table.publication,review_table.rate,review_table.netabare FROM book_table INNER JOIN user_table ON book_table.uid = user_table.id 
      // INNER JOIN review_table ON book_table.gid = review_table.gid 
      // WHERE review_table.uid=:uid AND review_table.gid=:gid"); // prepareメソッドを呼び出し
      //   $stmt->bindValue(':uid', $v['uid'], PDO::PARAM_INT); // bindValueメソッドを呼び出し
      //   $stmt->bindValue(':gid', $v['gid'], PDO::PARAM_INT); // bindValueメソッドを呼び出し
      //   $stmt->bindValue(':bid', $v['bid'], PDO::PARAM_INT);
      $stmt = $pdo->prepare("SELECT user_table.id,book_table.gid,review_table.rid,review_table.uid,review_table.bid,review_table.cid,review_table.tag,review_table.status,review_table.review,review_table.publication,review_table.rate,review_table.netabare FROM book_table INNER JOIN user_table ON book_table.uid = user_table.id 
      INNER JOIN review_table ON book_table.gid = review_table.gid 
      WHERE review_table.uid=:uid AND review_table.gid=:gid"); // prepareメソッドを呼び出し
      $stmt->bindValue(':uid', $v['uid'], PDO::PARAM_INT); // bindValueメソッドを呼び出し
      $stmt->bindValue(':gid', $v['gid'], PDO::PARAM_STR); // bindValueメソッドを呼び出し
      $gid = $v['gid'];
      // echo "ユーザーID: " . $gid;
      $status = $stmt->execute();
      if ($status == false) {
        sql_error($stmt);
      }
      $values03 = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($values03);
      //if($values03):

    ?>
      <div class="loop_books_item">
        <div class="books_item_btn" id="books_item_btn[<?= $i ?>]">
          <figure>
            <img src="<?= $v['thumbnail'] ?>" alt="<?= $v['title'] ?>">
          </figure>
        </div>
        <div id="popup-wrapper[<?= $i ?>]" class="popup-wrapper">
          <form action="book_shelf_insert.php" method="POST" id="detail_box[<?= $i ?>]" class="detail_box">
            <div id="popup-inside[<?= $i ?>]" class="popup-inside">
              <div id="popup-close[<?= $i ?>]" class="popup-close"><?= $v['title'] ?> <span>×</span></div>
              <div id="message[<?= $i ?>]" class="message">
                <div class="message_top_box">
                  <div class="message_top_left"><img src="<?= $v['thumbnail'] ?>"></div>
                  <div class="message_top_right">
                    <h2><?= $v['title'] ?></h2>
                    <p><?= $v['publisher'] ?> / <?= $v['publishedDate'] ?></p>

                    <div class="btn_box">
                      <p class="shop_btn"><a href="<?= $v['buyLink'] ?>">購入する</a></p>
                      <div class="shop_btn02">
                        <a href="edit.php?bid=<?= $v['bid'] ?>&uid=<?= $v['uid'] ?>">詳細編集</a>
                        <a href="book_shelf_delete.php?bid=<?= $v['bid'] ?>">削除</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="message_middle_box">
                  <dl class="valuation_box">
                    <dt class="valuation_title">読書状況</dt>
                    <dd class="valuation_column">
                      <?php
                      $status_word = ["未設定", "読みたい", "今読んでいる", "積読", "読了"];
                      for ($i = 0; $i < 5; $i++) {
                        $checked = (!empty($values03) && $i == $values03[0]['status']) ? "checked" : "";
                        echo "<input id='readingStatus{$i}' type='radio' name='readingStatus' value='{$i}' {$checked}>";
                        echo "<label for='readingStatus{$i}'>" . $status_word[$i] . "</label>";
                      } ?>
                    </dd>
                  </dl>
                  <dl class="">
                    <?php
                    //1.  DB接続します
                    $pdo = db_conn();

                    //2. データ登録SQL作成
                    $stmt = $pdo->prepare("SELECT * FROM book_category WHERE uid=:uid"); // prepareメソッドを呼び出し
                    $stmt->bindValue(':uid', $uid, PDO::PARAM_STR); // bindValueメソッドを呼び出し
                    $status = $stmt->execute();
                    //3. SQL実行時にエラーがある場合STOP
                    if ($status == false) {
                      sql_error($stmt);
                    } ?>
                    <dt class="valuation_title">カテゴリー</dt>
                    <dd class="valuation_column">
                      <select name="category_list" id="category_list" class="category_list">
                        <?php
                        $values02 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if (!$values02) { ?>
                          <option value="">未設定</option>
                        <?php } else { ?>
                          <option value="">選択してください</option>
                          <?php
                          foreach ($values02 as $v02) :
                            echo $v02['cid'];
                            // var_dump($values03[0]['cid']);
                            $selected = (!empty($values03) && $v02['cid'] == $values03[0]['cid']) ? "selected" : "";
                          ?>
                            <option value="<?= $v02['cid'] ?>" <?= $selected ?>><?= $v02['cname'] ?></option>
                        <?php
                          endforeach;
                        } ?>
                      </select>
                      <p id="cate_plus_btn" class="cate_plus_btn"><i class="bi bi-plus-circle"></i>　追加</p>
                    </dd>
                  </dl>
                  <dl class="">
                    <dt class="valuation_title">タグ</dt>
                    <dd class="valuation_column"><textarea name="valuation_tag" id="valuation_tag" placeholder="タグはスペース区切りで複数入力できます">
                    <?php if (isset($values03[0]['tag'])) echo $values03[0]['tag']; ?></textarea></dd>
                  </dl>
                  <dl class="">
                    <dt class="valuation_title">公開状況</dt>
                    <dd class="valuation_column">
                      <?php
                      $checked = (!empty($values03) && $values03[0]['publication'] == 1) ? "checked" : ""; ?>
                      <input type="checkbox" name="publicationStatus" id="publicationStatus" <?= $checked ?>>
                      <label for="publicationStatus">非公開で登録</label>
                    </dd>
                  </dl>
                </div>
                <div class="message_bottom_box">
                  <?php if (!empty($values03)) : ?>
                    <?php $rate = $values03[0]["rate"]; ?>
                    <div class="message_rate home">
                      <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <span data-value="<?= $i ?>" title="評価:<?= $i ?>" <?php if ($i <= $rate) echo 'class="active"'; ?>></span>
                      <?php } ?>
                      <input type="hidden" name="reviewRate" id="reviewRate" value="<?= $values03[0]["rate"] ?>">
                    </div>
                  <?php else : ?>
                    <div class="message_rate home">
                      <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <span data-value="<?= $i ?>" title="評価:<?= $i ?>"></span>
                      <?php } ?>
                      <input type="hidden" name="reviewRate" id="reviewRate">
                    </div>
                  <?php endif; ?>
                  <!-- <div class="message_rate">
                    <span data-value="5" title="評価:5"></span>
                    <span data-value="4" title="評価:4"></span>
                    <span data-value="3" title="評価:3"></span>
                    <span data-value="2" title="評価:2"></span>
                    <span data-value="1" title="評価:1"></span>
                    <input type="hidden" name="reviewRate" id="reviewRate">
                  </div> -->
                  <textarea name="message_review" class="message_review" placeholder="感想を書いてください"><?php if (isset($values03[0]['review'])) echo $values03[0]['review']; ?></textarea>

                  <?php
                  $checked = (!empty($values03) && $values03[0]['netabare'] == 1) ? "checked" : ""; ?>
                  <input type="checkbox" name="netabare" id="netabare" <?= $checked ?>>
                  <label for="netnetabare">ネタバレです</label>
                  <input type="hidden" name="uid" value="<?= $uid ?>">
                  <input type="hidden" name="gid" value="<?= $gid ?>">
                  <input type="hidden" name="bid" value="<?= $v['bid'] ?>">
                  <input type="submit" class="save_btn" value="レビューを保存">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php
      //Endif;
      $i++;
    endforeach;
    ?>
  <?php else : ?>
    <p class="h2">本棚が空です。</p>
  <?php endif; ?>
>>>>>>> 3da83af (PHP選手権用提出)
</div>
<script>
  $(document).ready(function() {
    $(".books_item_btn").on("click", function(e) {
      e.preventDefault();
      $(this).next(".popup-wrapper").toggleClass('active');
    });
    $(".popup-close").click(function() {
      $(this).closest(".popup-wrapper").removeClass('active');
    });
    //
    var originalSrc = "./img/star-off.png";
    var hoverSrc = "./img/star-on.png";

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

    $('label').click(function() {
      $(this).prev('input').prop('checked', true);
    });
    $('.cate_plus_btn').on('click', function() {
      // $('.cate_plus_wrap').toggleClass('active');
      $('.cate_plus_wrap').addClass('active');
    });
    $('.cancel_btn').on('click', function() {
      $('.cate_plus_wrap').removeClass('active');
    });
  });
</script>
<?php include 'footer.php'; ?>