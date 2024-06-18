<?php
session_start();
$token = isset($_GET['urltoken']) ? str_replace(' ', '+', urldecode($_GET['urltoken'])) : "";
// var_dump($token);
$_SESSION['token'] = $token;
?>
<?php include 'header.php'; ?>
  <form action="reset_act.php" method="post" name="requestpass_form" id="login_form" class="login_form">
  <h2 class="h2">パスワードを忘れた方</h2>
  <?php
      if (isset($_SESSION['error'])) :
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
      endif;
      ?>
  <fieldset>
        <div class="input_text_box mx-auto">
          <label class="input_text_lbl">新しいパスワード：</label>
          <div class="">
            <input type="password" name="lpw" class="input_text">
            <p class="error"></p>
          </div>
        </div>
        <div class="input_text_box mx-auto">
          <label class="input_text_lbl">新しいパスワード（確認用）：</label>
          <div class="">
            <input type="password" name="password_confirmation" class="input_text">
            <p class="error"></p>
          </div>
        </div>
      </fieldset>
      <input type="hidden" name="token" value="<?= $token?>">
      <button type="submit" class="submit_btn">送信</button>
  </form>
  <?php include 'footer.php'; ?>