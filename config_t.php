<?php
include("config.php");

$token = "MTQ1OTkzNTU5N3NhbXBsZTE0NTk5MzU1OTc";
$path = getPath($token);

echo $path['log']."<br>";
echo $path['repo'];
?>
