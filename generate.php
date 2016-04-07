<?php
/*
ex:
generate.php?folder_name=

產生 token
1. 輸入 foder name
2. folder_name+日期 進行 base64_encode -> token
3. 顯示 http://DNS/token='token'
4. 紀錄 token 在 config 中
*/

$cur_time =  time();
$folder_name = $_GET['folder_name'];

if (empty($folder_name)) {
  # code...
  echo "Error!!";
  exit;
}

$str = base64_encode($cur_time.$folder_name.$cur_time);


$path_parts = pathinfo($_SERVER['REQUEST_URI']);

echo "【Webhook is】 ";
echo '<br><br>';
echo $_SERVER['HTTP_HOST'].$path_parts['dirname']."/deploy.php?token=".$str."<br>";

echo "<br>";
echo "1. 透過 generate.php 取得 token<br>";
echo "2. 將 token 設定於 config.php<br>";
echo "3. 初始化 deploy repo<br>";
echo "4. 將 (1) 中取得的 webhook 設定於 gitlab or github<br>";
echo "5. 於網址中，測試 (1) 中得到 webhook<br>";

echo "<br>";
echo "<hr>";
echo "注意若測試失敗<br>"
echo "1. 請確認用的是 ssh 還是 https<br>";
echo "2. 確認 config 中的路徑設定<br>";



?>
