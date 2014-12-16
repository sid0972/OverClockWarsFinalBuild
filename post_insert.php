<?php
session_start();
require_once('bookmark_fns.php');
do_html_header('Post');

do_html_left();
do_html_right();
//$name=$_POST['name'];
check_valid_user();
echo "<html><body>";

/*$user_id_get="select user_id from users where username='$name'";
$user_id=mysql_query($user_id_get);
if($user_id)	{ echo "user id is '$user_id'"; break; }
else { echo "didnt get the user_id"; break;}*/
if(($_POST['text_post']==NULL))
{
	echo "<br><br><br><br><center>You have to write something at least. Please try again</center>";
	echo "<br><br><br><center><a href=\"profile.php?id=".$_GET['id']."\">Click here to go back</a></center>";
	break;
}
$query="insert into posts(post_by,post_content,username,post_date) values ('".mysql_real_escape_string($_SESSION['valid_user'])."','".mysql_real_escape_string($_POST['text_post'])."','".mysql_real_escape_string($_GET['id'])."',NOW())";
$result=mysql_query($query);

if($result)
	{
		echo "<center><br><br><br><br><center>Post inserted. You will be taken back.<br><br><br><a href=\"profile.php?id=".$_GET['id']."\">Click here to go back</a></center> ";
		header("location:profile.php?page=1&id=".$_GET['id']."");
	}
else
	{
		echo "<br><br><br><center>Your post wasn't inserted due to seme error</center>";
		echo "<center><br><br><br><a href=\"profile.php?id=".$_GET['id']."\">Click here to go back</a> </center>";
	}
	
do_html_footer();
?>
</body></html>
