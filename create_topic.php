<?php
session_start();
require_once('bookmark_fns.php');
check_valid_user();
$id=mysql_real_escape_string($_GET['id']);
?>
<html><body>
<form method="post" action="insert_topic.php?id=<?php echo $id ?> ">
 	Topic name: <input type="text" name="topic_subject" /><br><br><br><br>
 	Description: <textarea name="post_content" rows="10" cols="30"/></textarea>
 <input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="submit" value="Add topic" />
 </form>
<?php echo "id is ".$_GET['id']." and $ is ".$id." "; ?>
 </body></html>
 
