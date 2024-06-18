<?php
//Fileが送信されてきているのか？チェック！
if (isset($_FILES["upfile"]) && $_FILES["upfile"]["error"] == 0) {
  //情報取得
  $file_name = $_FILES["upfile"]["name"];
  $tmp_path  = $_FILES["upfile"]["tmp_name"];
  //ユニークファイル名作成
  $extension = pathinfo($file_name, PATHINFO_EXTENSION);
  $file_name = date("YmdHis") . md5(session_id()) . "." . $extension;
  // FileUpload [--Start--]
  $img = "";
  $file_dir_path = "upload/" . $file_name;
  if (is_uploaded_file($tmp_path)) {
    if (move_uploaded_file($tmp_path, $file_dir_path)) {
      chmod($file_dir_path, 0777);
      $img = "成功";
    } else {
      $img = "Error:アップロードできませんでした。";
    }
  }
} else {
  $img = "Error:画像が送信されていません";
}



?>