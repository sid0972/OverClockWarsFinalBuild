<?php
session_start();
require_once('bookmark_fns.php');
check_valid_user();
do_html_header('Add Topic');

do_html_left();
do_html_right();

$topic=mysql_real_escape_string($_POST['topic_subject']);
$content=mysql_real_escape_string($_POST['post_content']);
$id=mysql_real_escape_string($_GET['id']);

echo $topic."<br>";
echo $content."<br>";
echo $id."<br>";

$query="INSERT INTO topics(topic_subject,topic_date,topic_cat,topic_by) VALUES('".$topic."',NOW(),'".$_GET['id']."','".mysql_real_escape_string($_SESSION['valid_user'])."')";
$result=mysql_query($query);
$topicid=mysql_insert_id();
echo $topicid."<br>";
if(!$result)	
{
	 echo "<br>uh oh, wrong code for topic<br>";
	 $query="ROLLBACK";
	 $res=mysql_query($query);
}
/*else
{
	$query="commit";
	$res=mysql_query($query);
}
*/
$sql = "INSERT INTO forum(post_content,post_date,post_topic,post_by) VALUES ('" . $content . "',NOW(),'" .$topicid . "','" .mysql_real_escape_string( $_SESSION['valid_user']) . "')";
$results=mysql_query($sql);
if(!$results)	
{ 
	echo "<br>uh oh, wrong code for post<br>";	
	 $query="ROLLBACK";
	 $res=mysql_query($query);
}
else
{
	$query="commit";
	$res=mysql_query($query);
}
echo "<br><br>click <a href=\"categories.php\">here</a> to go back";
do_html_footer();
?>
