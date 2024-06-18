<?php
ini_set('display_errors', 1);
<<<<<<< HEAD
session_start();

$urltoken = isset($_GET["urltoken"]) ? $_GET["urltoken"] : "";

include "funcs.php";
=======
// session_start();
include 'header.php';
$urltoken = isset($_GET["urltoken"]) ? $_GET["urltoken"] : "";

// include "funcs.php";
>>>>>>> 3da83af (PHP選手権用提出)
$pdo = db_conn();
$pdo->beginTransaction();
$pdo->commit();
$sql = "SELECT email FROM user_table WHERE token=:token AND member_flg=0 AND indate > now() - interval 24 hour";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':token', $urltoken, PDO::PARAM_STR);
$status = $stmt->execute();
if ($status == false) {
  sql_error($stmt);
}

$row_count = $stmt->rowCount(); ?>


<<<<<<< HEAD
<?php include 'header.php'; ?>
=======

>>>>>>> 3da83af (PHP選手権用提出)
    <?php
    if ($row_count == 1) {
      $val = $stmt->fetch();
      // var_dump($val['email']);
      $email = $val['email'];
      echo "<p>メールの確認ができました。ありがとうございました。</p>";
      echo "<p>下記のURLからログインをお願いします。</p>";
      $sql = "UPDATE user_table SET member_flg=1 WHERE email=:email";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':email', $email, PDO::PARAM_STR);
<<<<<<< HEAD
      $stmt->execute();    
      echo "<br><a href='./login.php' class='signup_btn'>ログイン画面</a>";

      $url = "https://gajumaro.sakura.ne.jp/kadai3/login.php";
=======
      $status = $stmt->execute();    
      echo "<br><a href='./login.php' class='signup_btn'>ログイン画面</a>";

      $url = "https://gajumaro.sakura.ne.jp/php/login.php";
>>>>>>> 3da83af (PHP選手権用提出)
      $message = "本登録が出来ました。ありがとうございました。";
      $mailTo = $email;
      $body = <<< EOM
       この度はご登録いただきありがとうございます。<br>
       下記、URLよりログインをお願い致します。<br>
       {$url}
    EOM;
      mb_language('ja');
      mb_internal_encoding('UTF-8');

      $companyname = "Ando";
      $companymail = "gajumaro@gajumaro.sakura.ne.jp";
      $registation_subject = "本登録ありがとうございます";
      //Fromヘッダーを作成
      $header = 'From: ' . mb_encode_mimeheader($companyname) . '<' . $companymail . '>';

      if (mb_send_mail($mailTo, $registation_subject, $body, $header, '-f' . $companymail)) {
        //セッション変数を全て解除
        
        $_SESSION = array();
        //クッキーの削除
        if (isset($_COOKIE["PHPSESSID"])) {
          setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        //セッションを破棄する
        session_destroy();
        $message = "本登録完了のメールさせていただきました。これから、どうぞよろしくお願い致します。";
      }
      // redirect("si.php");
    } else if ($row_count == 0) {
      $errors['urltoken_timeover'] = "このURLはご利用できません。<br>有効期限が過ぎたかURLが間違えている可能性がございます。<br>もう一度登録をやりなおして下さい。";
      echo "<p>このURLはご利用できません。有効期限が過ぎたかURLが間違えている可能性がございます。もう一度登録をやりなおして下さい。</p>";
      echo "<br><p><a href='./user.php' class='signup_btn'>ユーザー登録画面へ</a></p>";
    } ?>

<?php include 'footer.php'; ?>