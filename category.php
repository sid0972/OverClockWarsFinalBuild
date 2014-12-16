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
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * 10; 
		//do a query for the topics
		$sql = "SELECT topic_id,topic_subject,topic_date,topic_cat FROM topics WHERE topic_cat = '" . mysql_real_escape_string($_GET['id'])."' order by topic_date desc LIMIT ".$start_from.", 10";
 
		$rs_result = mysql_query ($sql); 
 
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
 
				while($row = mysql_fetch_assoc($rs_result))
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
				
				$sql = "SELECT COUNT(topic_id) FROM topics "; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 10); 

if ($total_pages < 2) { echo " "; }
else
{
	echo "Page ";

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='category.php?page=".$i."&id=".$id."'> ".$i."</a> "; 
}
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
