<?
/*
initial_deploy_repo.php?token=&repo_link=
*/
include("config.php");

$repo_link = $_GET['repo_link'];
$config = getPath($_GET['token']);
if ($config == '') {
  echo "Thank you!!";
  exit;
}


$_repoN       	= $config['repoName'];
$_repoParentDir = $config["repoUpDir"];
$_repoDir 		= $config["repoDir"];

echo "repo link : ".$repo_link."<br>";
echo "repo name : ".$_repoN."<br>";
echo "repo parent dir : ".$_repoParentDir."<br>";
echo "repo dir : ".$_repoDir."<br>";
echo "<hr>";
// exit;

if (!file_exists($_repoDir)) {
  echo "Do : ";
  echo "<br>";
  echo "1. create repoDir <br> 2. git init <br> 3. git remote add origin $repo_link<br>";

  `cd $_repoParentDir;pwd;mkdir $_repoN;ls`;
  `cd $_repoDir; git init;git remote add origin $repo_link`;
}
else
{
	echo "Can't build the git repo";
}
?>
