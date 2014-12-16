<?php
session_start();
require_once('bookmark_fns.php');
check_valid_user();

$score=mysql_real_escape_string($_POST['score']);
$link=mysql_real_escape_string($_POST['link']);
$name = mysql_real_escape_string($_SESSION['valid_user']);

check_scorespi($score);

if(!check_url($link))
{
	echo " ";
}
else
{
	echo "<center><br><br><br><br>Bad url";
	echo "<br><br><br><a href=\"my_oc.php\">Or click here to go back</a></center>";
}

$query="update superpi set score='$score',link='$link' where username='$name'";
$result=mysql_query($query);

if($result)
	{
		
		echo "<br><br><br><br><br><br><center>Score inserted. You will be taken back.<br><br><br><a href=\"my_oc.php\">Or click here to go back</a>";
		header("location:my_oc.php");
	}
else
	{	
		
		echo "<br><br><br><br><br><br><center>Sorry, your score was not inserted.You will be taken back.<br><br><br><a href=\"my_oc.php\">Or click here to go back</a>";
		header("location:my_oc.php");
		
	}
?>

