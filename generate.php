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
$str = base64_encode($cur_time.$folder_name.$cur_time);

echo $_SERVER['HTTP_HOST']."/deploy.php?token=".$str;

/*
是否在此建立 repo 的資料夾與 remote 的位置？
*/

?>
