<?php
session_start();
$name=$_SESSION['valid_user'];
$loc="./uploads/";
$path=$loc.$name;
echo $path."<br>";
if(is_dir($path))
{
	echo "<br>exists";
} else { echo "<br>not exists"; }
$files = glob($path."/");
for ($i=1; $i<count($files); $i++)
{
	$num = $files[$i];
	print $num."<br />";
	echo '<img src="'.$path.'" alt="random image" height="100" width="100"/>'."<br /><br />";
}
?>
