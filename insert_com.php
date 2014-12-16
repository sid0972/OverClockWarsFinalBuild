<?php
session_start();
require_once('bookmark_fns.php');
check_valid_user();

/*$id=$_GET['id'];
$name=$_SESSION['valid_user'];
$comment=$_POST['comment'];*/
//if(strlen($_POST['comment']<1))
if(($_POST['comment'])==NULL)
{
	echo "<br><br><br><br><center>You have to write something at least. Please try again</center>";
	echo "<br><br><br><center><a href=\"all_ocs.php?id=".$_GET['id']."\">Click here to go back</a></center>";
	break;
}
$query="insert into comments(comment,username,com_by,com_time) values ('".mysql_real_escape_string($_POST['comment'])."','".mysql_real_escape_string($_GET['id'])."','".mysql_real_escape_string($_SESSION['valid_user'])."',NOW())";
$result=mysql_query($query);

if($result)
{
	echo "<center><p>comment successfully inserted\n";
	echo "<a href=\"all_ocs.php?id=".$_GET['id']."\">Click</a> to go back</p></center>";
}
else
{
	echo "<center>Tough luck matey<br><a href=\"all_ocs.php?id=".$_GET['id']."\">Click</a> to go back</center>";
}
?>
