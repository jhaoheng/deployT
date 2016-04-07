<?php

/*
ex:
deploy.php?token=

1. 收到 webhook 給予的 token
2. 將 token 拿到後，去資料庫查找路徑
*/

include("config.php");

$config = getPath($_GET['token']);
if ($config == '') {
  echo "Thank you!!";
  exit;
}

$_logDir = $config['logDir'];
$_repoDir = $config['repoDir'];
$_branch = $config['branch'];

//檢查 deploy repo 是否設定完成
if (!checkRepoFolder($_repoDir)) {
  echo "Error : your deploy repo not ready to set and init.";
  exit;
}

//檢查 log 路徑
checkLog($_logDir);//確認 log 路徑

//執行指令 or shell命令，並將return msg寫進日誌
//git fetch -q --all
//git pull
echo "<br>";
$cmd = "cd $_repoDir ; git pull origin $_branch";

$output = shell_exec($cmd);
// echo $output."<br>";
w_log($_logDir,$output);


//確認路徑
function checkLog($_logDir)
{
  $logN = 'log.txt';
  $_logPath = $_logDir.'/'.$logN;

  if (!file_exists($_logDir)) {
    mkdir($_logDir,0777,true);
    shell_exec("cd $_logDir && echo > ".$logN);
  }

  if (filesize($_logPath)>5000000) {
      copy($_logPath, $_logDir."/".date("Y-m-d H:i:s").'.txt');
      file_put_contents($_logPath, " ");
  }
}

function w_log($_logDir,$output)
{
  $logN = 'log.txt';
  $_logPath = $_logDir.'/'.$logN;

  $client_ip = $_SERVER['REMOTE_ADDR'];

  $fs = fopen($_logPath, 'a');
  fwrite($fs, '================ Update Start ==============='.PHP_EOL.PHP_EOL);

  fwrite($fs, 'Request on ['.date("Y-m-d H:i:s").'] from ['.$client_ip.']'.PHP_EOL);

  //取得 hooks 訊息...
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);
  if ($data == '') {
    $data = '[no data from git application]';
  }
  //寫入訊息
  fwrite($fs, 'Data : '.print_r($data, true).PHP_EOL);

  fwrite($fs, 'Info : '. $output.PHP_EOL);

  fwrite($fs,PHP_EOL. '================ Update End ==============='.PHP_EOL.PHP_EOL);

  fclose($fs);
}

function checkRepoFolder($_folder)
{
  if (file_exists($_folder)){
    return true;
  }
  else {
    return false;
  }
}
?>
