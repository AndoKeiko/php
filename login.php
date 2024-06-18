<?php
<<<<<<< HEAD
session_start();
if (!isset($_SESSION['chk_ssid'])) {
  $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
var_dump($_SERVER['REQUEST_URI']);
  // redirect("login.php");
}
?>
<?php include 'header.php'; ?>
  <form action="login_act.php" method="post" name="login_form" id="login_form" class="login_form">
  <h2 class="h2">ログイン</h2>
  <?php
      if (isset($_SESSION['error'])) :
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
      endif;
      ?>
  <fieldset>
        <div class="input_text_box mx-auto">
          <label class="input_text_lbl">ID：</label>
          <div class="">
            <input type="text" name="lid" class="input_text">
            <p class="error"></p>
          </div>
        </div>
        <div class="input_text_box mx-auto">
          <label class="input_text_lbl">PASS：</label>
          <div class="">
            <input type="password" name="lpw" class="input_text">
            <p class="error"></p>
          </div>
        </div>
      </fieldset>
      <button type="submit" class="submit_btn">送信</button>
      <a href="user.php" class="signup_btn">新規登録はこちら</a>
      <a href="requestpass.php">パスワードを忘れた方はこちら</a>
  </form>
  <?php include 'footer.php'; ?>
=======
ini_set('display_errors', 1);
// session_start();
?>
<?php include 'header.php';
$uid = isset($_SESSION["uid"]) ? $_SESSION["uid"] : '';
?>
<form action="login_act.php" method="post" name="login_form" id="login_form" class="login_form">
  <h2 class="h2">ログイン</h2>
  <?php
  if (isset($_SESSION['error'])) :
    echo "<p class='error'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
  endif;
  ?>
  <fieldset>
    <div class="input_text_box mx-auto">
      <label class="input_text_lbl">ID：</label>
      <div class="">
        <input type="text" name="lid" class="input_text">
        <p class="error"></p>
      </div>
    </div>
    <div class="input_text_box mx-auto">
      <label class="input_text_lbl">PASS：</label>
      <div class="">
        <input type="password" name="lpw" class="input_text">
        <p class="error"></p>
      </div>
    </div>
  </fieldset>
  <button type="submit" class="submit_btn">送信</button>
  <a href="user.php" class="signup_btn">新規登録はこちら</a>
  <a href="requestpass.php">パスワードを忘れた方はこちら</a>
</form>
<?php include 'footer.php'; ?>
>>>>>>> 3da83af (PHP選手権用提出)
