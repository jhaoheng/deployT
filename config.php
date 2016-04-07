<?php
// include("ip_access.php");

/*
設定
*/


function getPath($token)
{
  /*
  ex :
  root/folder_1/folder_2/config.php
  $parent_path = root/folder_1/
  $current_path = root/folder_1/folder_2/
  根據要 deploy 的路徑位置進行設定
  */
  $parent_path = dirname(dirname(__FILE__));//父路徑
  $current_path = dirname(__FILE__);

  $config;
  if ($token == 'MTQ1OTkzNTU5N3NhbXBsZTE0NTk5MzU1OTc') {
    $repoN = 'sample_deploy';
    $config[repoName] = $repoN;
    $config[logDir] = $current_path.'/'.$repoN;
    $config[repoUpDir] = $current_path;
    $config[repoDir] = $parent_path.'/'.'sample_demo'.'/'.$repoN;
    $config[branch] = 'master';
  }
  return $config;
}


/*
no use
*/
function set($repoN,$logN)
{
  /*
  ex :
  root/folder_1/folder_2/config.php
  $parent_path = root/folder_1/
  $current_path = root/folder_1/folder_2/
  根據要 deploy 的路徑位置進行設定
  */

  $parent_path = dirname(dirname(__FILE__));//父路徑
  $current_path = dirname(__FILE__);

  $folder;
  $name;
  $path;

  $folder['log'] = $current_path.'/'.$repoN;
  $name['log'] = $logN;
  $path['log'] = $folder['log'].'/'.$name['log'];

  $folder['repo'] = $parent_path.'/'.$repoN;
  $name['repo'] = $repoN;
  $path['repo'] = $folder['repo'].'/'.$name['repo'];

  $resource['floder'] = $folder;
  $resource['name'] = $name;
  $resource["path"] = $path;
  return $resource;
}

?>
