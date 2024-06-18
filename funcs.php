<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}

/**
 * .envファイルを読み込んで環境変数を設定する関数
 *
 * @param string $path .envファイルのパス
 */
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception('.env file not found.');
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // コメント行をスキップ
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}
// .envファイルを読み込む
loadEnv(__DIR__ . '/.env');

function db_conn(){
  try {
    $db_name = $_ENV['db_name'];
    $db_id = $_ENV['db_id'];
    $db_pw = $_ENV['db_pw'];
    $db_host = $_ENV['db_host'];
    return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
  } catch (PDOException $e) {
    exit('DB Connection Error'.$e->getMessage());
  }
}
//SQLエラー
function sql_error($stmt){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//リダイレクト
function redirect($file_name){
  header("Location: ".$file_name);
  exit();
}

function sschk (){
  if(!isset($_SESSION["chk_ssid"])||$_SESSION["chk_ssid"]!= session_id()){
    header('Location: login.php');
    exit("LOGIN ERROR");
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"]=session_id();
  }
}

<<<<<<< HEAD



=======
function formatDate($date) {
  $dateTime = new DateTime($date);          
  return $dateTime->format('Y年n月j日');
}

function fileUpload($fname,$path){
  if(isset($_FILES[$fname]) && $_FILES[$fname]["error"] == 0){
    $file_name = $_FILES[$fname]["name"];
    $tmp_path = $_FILES[$fname]["tmp_name"];
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_name = date("YmdHis").md5(session_id()).".".$extension;
    $file_dir_path = $path.$file_name;
    if (is_uploaded_file($tmp_path)) {
      if (move_uploaded_file($tmp_path, $file_dir_path)){
        chmod($file_dir_path, 0777);
        return $file_dir_path;
      } else {
        error_log("move_uploaded_file failed for " . $_FILES[$fname]['name']);
        return 1;
      }
    }
    }else{
      error_log("File upload error: " . $_FILES[$fname]['error']);
      return 2;
    }
}
>>>>>>> 3da83af (PHP選手権用提出)


?>