<?
/*
initial_deploy_repo.php?reponame=&repo_link=

建立的路徑為此 folder 的父層
*/
$repo_link = $_GET['repo_link'];
$repoN = $_GET['repo_name'];
$parent_path = dirname(dirname(__FILE__));

$repo_path = $parent_path.'/'.$repoN;
echo $repo_path;

if (!file_exists($repo_path)) {
  mkdir($repo_path,0777,true);
  // shell_exec("cd $repo_path");
  shell_exec("cd $repo_path && git clone $repo_link");
  // shell_exec("cd $repo_path && git init && git remote add origin ".$repo_link);
}
?>
