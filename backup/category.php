<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Categories');
check_valid_user();
do_html_left();
do_html_right();

$id=mysql_real_escape_string($_GET['id']);
//first select the category based on $_GET['cat_id']
$sql = "SELECT
			cat_id,
			cat_name,
			cat_description
		FROM
			categories
		WHERE
			cat_id = " . mysql_real_escape_string($_GET['id']);
 
$result = mysql_query($sql);
 
if(!$result)
{
	echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This category does not exist.';
	}
	else
	{
		//display category data
		while($row = mysql_fetch_assoc($result))
		{
			echo "<h2>Topics in ".htmlspecialchars($row['cat_name'])." category</h2>";
		}
 
		//do a query for the topics
		$sql = "SELECT
					topic_id,
					topic_subject,
					topic_date,
					topic_cat
				FROM
					topics
				WHERE
					topic_cat = '" . mysql_real_escape_string($_GET['id'])."' order by topic_date desc";
 
		$result = mysql_query($sql);
 
		if(!$result)
		{
			echo 'The topics could not be displayed, please try again later.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'There are no topics in this category yet.';
			}
			else
			{
				//prepare the table
				echo '<table border="1" align="center">
					  <tr>
						<th>Topic</th>
						<th>Created at</th>
					  </tr>';	
 
				while($row = mysql_fetch_assoc($result))
				{
					echo '<tr>';
						echo '<td >';
							echo "<h3><a href=\"topic.php?id=".htmlspecialchars($row['topic_id'])."\">".htmlspecialchars($row['topic_subject'])."</a><h3>";
						echo '</td>';
						echo '<td >';
							echo date('d-m-Y', strtotime($row['topic_date']));
						echo '</td>';
					echo '</tr>';
				}
				echo "</table>";
			}
		}

		
	}
}
$row = mysql_fetch_assoc($result);
echo "<a href=\"create_topic.php?id=".$id."\">Create New Topic</a><br>";

do_html_footer();
?>
		
		
	

