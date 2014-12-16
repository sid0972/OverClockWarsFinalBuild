<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Members');
check_valid_user();
do_html_left();
do_html_right();

$query="select username,user_aname from users";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
	 echo "<a href=\"profile.php?id=".$row['username']."\">".$row['username']."</a>";
	 echo "real name is ".$row['user_aname']."";
	 echo "<br>";
	

}
if(!$result) 
{
	echo "<center><br><br><br><br>No users.This is one boring place.";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
do_html_footer();
?>

