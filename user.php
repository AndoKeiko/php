<<<<<<< HEAD
<?php
session_start();
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
?>
<?php include 'header.php'; ?>
    <form action="user_insert.php" method="post" name="login_form" id="login_form" class="login_form">
=======
<?php include 'header.php'; ?>
<?php
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
?>
<form action="user_insert.php" method="post" name="login_form" id="login_form" class="login_form">
>>>>>>> 3da83af (PHP選手権用提出)
      <h2 class="h2">ユーザー登録</h2>
      <?php
      if (isset($_SESSION['error'])) :
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
      endif;
      ?>
      <fieldset>
        <div class="input_text_box">
          <label class="input_text_lbl">name</label>
          <div class="">
            <input type="text" name="name" class="input_text w-full">
            <p class="error"></p>
          </div>
        </div>
        <div class="input_text_box">
          <label class="input_text_lbl">E-mail</label>
          <div class="">
            <input type="text" name="email" class="input_text w-full">
            <p class="error"></p>
          </div>
        </div>
        <div class="input_text_box">
          <label class="input_text_lbl">本棚アプリID</label>
          <div class="">
            <input type="text" name="lid" class="input_text w-full">
            <p class="error"></p>
          </div>
        </div>
        <div class="input_text_box">
          <label class="input_text_lbl">パスワード</label>
          <div class="">
            <input type="password" name="lpw" class="input_text w-full">
            <p class="error"></p>
          </div>
        </div>
      </fieldset>
      <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
      <button type="submit" class="submit_btn">送信</button>

    </form>

<?php include 'footer.php'; ?>