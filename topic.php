<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Topics');
do_html_left();
do_html_right();
check_valid_user();

$query="SELECT topic_id,topic_subject FROM topics WHERE topic_id ='".mysql_real_escape_string($_GET['id'])."'";
$result=mysql_query($query);
$topic=mysql_fetch_array($result);
$topicid=$topic['topic_id'];
if(!$result)
{
	echo 'The topics could not be displayed, please try again later.' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This topic does not exist.';
	}
	else
	{
		while($row = mysql_fetch_assoc($result))
		{
			echo "<h2>posts in ".htmlspecialchars($row['topic_subject'])." topic</h2>";
		}
		
		
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * 10; 
//$posts="SELECT forum.post_topic, forum.post_content, forum.post_date, forum.post_by, users.user_id, users.user_name FROM posts LEFT JOIN users ON posts.post_by = users.user_id WHERE posts.post_topic ='".mysql_real_escape_string($_GET['id'])."'";
$posts="select post_content,post_by,post_date from forum where post_topic='".$topicid."' order by post_date desc  LIMIT ".$start_from.", 10";

		
$results=mysql_query($posts);

if(!$results)
		{
			echo 'The posts could not be displayed, please try again later.';
		}
		
else
		{
			if(mysql_num_rows($results) == 0)
			{
				echo 'There are no posts yet.';
			}
			
			else
			{
				//prepare the table
				echo '<table border="1" align="center">
					  <tr>
						<th>User</th>
						<th>Message</th>
						<th>Created at</th>
					  </tr>';	
 
				while($row = mysql_fetch_assoc($results))
				{
					echo '<tr>';
						echo '<td >';
							echo "<h3><a href=\"profile.php?id=".$row['post_by']."\">".$row['post_by']."</a><h3>";
						echo '</td>';
						echo '<td >';
							echo "<p>".htmlspecialchars($row['post_content'])."</p>";
						echo '</td>';
						echo '<td >';
							echo date('d-m-Y', strtotime($row['topic_date']));
						echo '</td>';
					echo '</tr>';
				}
				
				$sql = "SELECT COUNT(post_content) FROM forum where post_topic='".$topicid."'";
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 10); 

if ($total_pages < 2) { echo " "; }
else
{
	echo "Page ";

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='topic.php?page=".$i."&id=".$topicid."'> ".$i."</a> "; 
}
}
				
				echo "</table>";
			}
		}
	}?>
	
	<form method="post" action="reply.php?id=<?php echo $topicid ?>">
    <p> Add a reply</p>
    <textarea name="reply_content"></textarea>
    <input type="submit" value="Submit reply" />
	</form>
			
<?php
}
do_html_footer();
?>
