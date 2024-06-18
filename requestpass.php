<?php
session_start();
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
?>
<?php include 'header.php'; ?>
  <form action="requestpass_act.php" method="post" name="requestpass_form" id="login_form" class="login_form">
  <h2 class="h2">パスワードを忘れた方</h2>
  <?php
      if (isset($_SESSION['error'])) :
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
      endif;
      ?>
  <fieldset>
        <div class="input_text_box mx-auto">
          <label class="input_text_lbl">メールアドレス：</label>
          <div class="">
            <input type="text" name="email" class="input_text">
            <p class="error"></p>
          </div>
        </div>
      </fieldset>
      <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
      <button type="submit" class="submit_btn">送信</button>
  </form>
  <?php include 'footer.php'; ?>