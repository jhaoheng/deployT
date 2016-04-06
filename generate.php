<?php
/*
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

// since PHP 5.2.0
// pathinfo($_SERVER['REQUEST_URI']);
// var_dump($_SERVER);

/*
是否在此建立 repo 的資料夾與 remote 的位置？
*/

?>
