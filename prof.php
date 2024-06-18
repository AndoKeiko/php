<?php
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

<p class="h2 w40"><img src='<?= isset($vals['prof_img']) ? $vals['prof_img'] : ''; ?>' width="60" height="60">
  <?= ($vals["prof_nickname"] == "") ? $vals["user_name"] : $vals["prof_nickname"]; ?>さんのプロフィールの設定</p>
<dl class="prof_wrap">
  <dt>本箱ID</dt>
  <dd><?= $vals['user_lid'] !== NULL ? $vals['user_lid'] : ''; ?></dd>
  <dt>ニックネーム</dt>
  <dd><?= isset($vals['prof_nickname']) ? $vals['prof_nickname'] : ''; ?></dd>
  <dt>性別</dt>
  <dd>
    <?php
    $options = [
      1 => '選択してください',
      2 => '男',
      3 => '女'
    ];
    $prof_gender = ($vals['prof_gender'] == "") ?  1 : $vals['prof_gender'];
    $prof_gender_pub = ($vals['prof_gender_pub'] == "") ?  0 : $vals['prof_gender_pub'];
    if ($prof_gender_pub != 0) {
      foreach ($options as $key => $value) {
        if ($key == $prof_gender) {
          echo $value;
        }
      }
    } else {
      echo "<p>非公開</p>";
    }
    ?>
  </dd>
  <dt>誕生日</dt>
  <dd>
    <?php $prof_birthday = ($vals['prof_birthday'] != "") ? $vals['prof_birthday'] : '';
    $birthday_pub = (isset($vals['birthday_pub']) && $vals['birthday_pub'] == 1) ? "checked" : "";
    if ($birthday_pub != 0) {
      echo $prof_birthday;
    } else {
      echo "<p>非公開</p>";
    }
    ?>
  </dd>
  <dt>WEBサイト</dt>
  <dd><?= isset($vals['prof_web']) ? $vals['prof_web'] : ''; ?></dd>
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
    ?>
    <?php
    foreach ($prefecture as $key => $ps) {
      if (isset($vals['prof_prefecture']) && $vals['prof_prefecture'] == $key) {
        echo $ps;
      }
    }
    ?>
  </dd>
</dl>
<div class="prof_wrap02">
  <h2>自己紹介</h2>
  <div class=""><?= ($vals['prof_text'] != "") ? $vals['prof_text'] : ''; ?></div>
</div>
<div class="prof_wrap02">
  <h2>好きなジャンル</h2>
  <div class="">
    <?php
    $prof_fab_j = isset($vals['prof_fab_janle']) ? $vals['prof_fab_janle'] : '';
    $fab_janle = array_filter(explode(" ", $prof_fab_j));
    foreach ($fab_janle as $fab_j) {
      echo "<span>" . $fab_j . "</span>";
    }
    ?></div>
  <?php  ?>
</div>
<div class="prof_wrap02">
  <h2>好きな作家</h2>
  <?php
  $prof_fab_a = isset($vals['prof_fab_auth']) ? $vals['prof_fab_auth'] : '';
  $fab_auth = array_filter(explode(" ", $prof_fab_a));
  foreach ($fab_auth as $fab_a) {
    echo "<span>" . $fab_a . "</span>";
  }
  ?>
</div>
</div>
<?php

?>
<?php include 'footer.php'; ?>