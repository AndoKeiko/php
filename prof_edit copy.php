<?php
session_start();
// $uid = $_SESSION["id"];
$uid = isset($_SESSION["uid"]) ? $_SESSION["uid"] : '8';
include 'header.php';
include "funcs.php";
//2. DB接続します
$pdo = db_conn();

$sql = "SELECT review_table.*, user_table.*,book_table.* FROM review_table
INNER JOIN user_table ON review_table.uid = user_table.id
INNER JOIN book_table ON review_table.bid = book_table.bid
WHERE user_table.id = :uid
ORDER BY review_table.indate ASC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
//3. SQL実行時にエラーがある場合STOP
if ($status == false) {
  sql_error($stmt);
}

//4. 抽出データ数を取得
$vals = $stmt->fetchAll();


?>

<p class="h2 w40"><img src="<?= $vals[0]["img"]; ?>" width="60px" height="60px"> <?= $vals[0]["name"]; ?>さんのプロフィールの設定</p>
<form action="prof_insert.php" method="POST" id="edit_insert" class="edit_insert">
  <dl>
    <dt>本箱ID</dt>
    <dd><input type="text" name="lid" id="lid" class="input_text"></dd>
    <dt>ニックネーム</dt>
    <dd><input type="text" name="nickname" id="nickname" class="input_text"></dd>
    <dt>プロフィール画像</dt>
    <dd>
      <p class="mb-4"><a href="#" id="select_btn" class="btn_camera">カメラ/写真選択</a></p>
      <input type="file" accept="image/*" capture="camera" id="image_file" name="prof_img" style="display:none;">
    </dd>
    <dt>自己紹介</dt>
    <dd><textarea type="text" name="prof_text" id="prof_text" class="input_text"></textarea></dd>
    <dt>性別</dt>
    <dd><input type="text" name="prof_text" id="prof_text" class="input_text">
      <div class="valuation_column">
        <?php
        $checked = (!empty($values03) && $values03[0]['publication'] == 1) ? "checked" : ""; ?>
        <input type="checkbox" name="publicationStatus" id="publicationStatus" <?= $checked ?>>
        <label for="publicationStatus">非公開で登録</label>
      </div>
    </dd>
    <dt>誕生日</dt>
    <dd>
      <input type="date" name="birthday" id="birthday" class="input_text">
      <div class="valuation_column">
        <?php
        $checked = (!empty($values03) && $values03[0]['publication'] == 1) ? "checked" : ""; ?>
        <input type="checkbox" name="publicationStatus" id="publicationStatus" <?= $checked ?>>
        <label for="publicationStatus">非公開で登録</label>
      </div>
    </dd>
    <dt>WEBサイト</dt>
    <dd><textarea type="text" name="web" id="web" class="input_text"></textarea></dd>
    <dt>都道府県</dt>
    <dd>
      <?php
      $prefecture = array(
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
          echo "<option value='{$key}'>{$ps}</option>";
        } ?>
      </select>
    </dd>
    <dt>好きなジャンル</dt>
    <dd><textarea type="text" name="prof_text" id="prof_text" class="input_text" placeholder="スペース区切りで複数記載化"></textarea></dd>
    <dt>好きな作家</dt>
    <dd><textarea type="text" name="prof_text" id="prof_text" class="input_text" placeholder="スペース区切りで複数記載化"></textarea></dd>
    <dt>お気に入りベスト３</dt>
    <dd>
      
      <div action="search.php" method="post" class="search_box">
        作品名 <input type="text" name="intitle" id="intitle" class="input_text">
        <!-- <input type="hidden" name="page" id="page" class="input_text"> -->
        <button type="button" class="search_btn" id="search_btn"><i class="bi bi-search"></i> 検索</button>
      </div>
      <table>
        <tr>
          <td>1位</td>
          <td><input type="text" name="best_1" id="best_1"></td>
        </tr>
        <tr>
          <td>2位</td>
          <td><input type="text" name="best_2" id="best_2"></td>
        </tr>
        <tr>
          <td>3位</td>
          <td><input type="text" name="best_3" id="best_3"></td>
        </tr>
      </table>
      <div class="best_search" id="best_search">
        <div class="best_search_wrap" id="best_search_wrap">
          <h2>本検索</h2>
          <input type="text" name="best_search"><input type="button value=" 検索">
        </div>
      </div>
    </dd>
  </dl>
  <button type="submit" class="submit_btn">プロフィール更新</button>
</form>
<form method="post" action="fileupload.php" enctype="multipart/form-data" id="image_upload_form" style="display:none;">
  <input type="hidden" name="uid">
  <input type="file" accept="image/*" capture="camera" id="hidden_image_file" name="prof_img" style="display:none;">
</form>

<script>
  //非表示のinput type="file"をクリック
  $("#select_btn").on("click", function() {
    $("#image_file").trigger("click");
  });

  $(document).ready(function() {
    // 画像選択ボタンのクリックイベント
    $('#select_btn').on('click', function(e) {
      e.preventDefault();
      $('#image_file').click();
    });

    // 画像ファイルが選択された時のイベント
    $('#image_file').on('change', function() {
      var file = $(this).prop('files')[0];
      if (file) {
        if (file.size / 1024 > 500) {
          alert("ファイルサイズが500KBを超えています。");
          return false;
        } else {
          console.log("ファイルサイズはOKです。");
        }

        // hidden formのfile inputに選択されたファイルをセット
        $('#hidden_image_file').prop('files', $(this).prop('files'));
        // hidden formを送信
        $('#image_upload_form').submit();
      }
    });
    $('#search_btn').on('click', function() {
      var title = $('#intitle').val();
      $.ajax({
        type: 'POST',
        url: 'books_search.php',
        data: { intitle: title },
        success: function(books) {
          var data = books;
          // var data = JSON.parse(books);
          if (data.error) {
            alert(data.error);
          } else {
            // 取得したデータを表示する処理をここに追加
            console.log(data);
          }
        },
        error: function() {
          alert("エラーが発生しました。");
        }
      });
    });
  });
</script>
<?php include 'footer.php'; ?>