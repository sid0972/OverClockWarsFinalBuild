<?php
session_start();

require_once('bookmark_fns.php');


do_html_header('Reply');

do_html_left();
do_html_right();
$id=mysql_real_escape_string($_GET['id']);
$reply=mysql_real_escape_string($_POST['reply_content']);

echo '<br>';
if($reply==NULL)
{
	echo "<br><br><br><br><center>You have to write something at least. Please try again</center>";
	echo "<br><br><br><center><a href=\"topic.php?id=".$id."\">Click here to go back</a></center>";
	break;
}
$query="INSERT INTO forum(post_content,post_date,post_topic,post_by) VALUES ('".$reply."' , NOW() , '".$id."' , '".mysql_real_escape_string($_SESSION['valid_user'])."' )";
$result=mysql_query($query);
if(!$result)
{
	echo "<center><br><br><br><br>Tough luck";
	echo "Couldn't post your reply<br><br><br>click <a href=\"topic.php?id=".$id."\">here</a> to go back</center>";
}

else
{
	header("location:topic.php?id=".$id."");
	
}

do_html_footer();
?>
