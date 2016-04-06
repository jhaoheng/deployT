<?
/*
initial_deploy_repo.php?repo_name=&repo_link=

建立的路徑為此 folder 的父層

This file need to fixed!!!!!!!!!!
*/
$repo_link = $_GET['repo_link'];
$repoN = $_GET['repo_name'];
$parent_path = dirname(dirname(__FILE__));

$repo_path = $parent_path.'/'.$repoN;
echo $repoN."<br>";
echo $repo_link."<br>";
echo $parent_path."<br>";
echo $repo_path."<br>";

if (!file_exists($repo_path)) {
  // echo "he";
  // mkdir($repo_path,0777,true);
  // shell_exec("cd $parent_path");
  $cmd = "git clone $repo_link";
  echo $cmd."<br>";
  // $output = shell_exec("pwd");//shell_exec("cd $parent_path && git clone $repo_link");
  // exec("git clone $repo_link", $output, $return_var);
  $output = system('pwd', $return_var);
  // var_dump($output)."<br>";
  // echo $return_var;
  // shell_exec("cd $repo_path && git init && git remote add origin ".$repo_link);
}
?>
