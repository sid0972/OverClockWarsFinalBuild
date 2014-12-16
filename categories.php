<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Categories');
check_valid_user();
do_html_left();
do_html_right();

$query="SELECT cat_id, cat_name, cat_description FROM categories";
$result=mysql_query($query);

if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		//prepare the table
		echo '<table border="1" align="center">
			  <tr>
				<th>Category</th>
				<th>Last topic</th>
			  </tr>';	
 
		while($row = mysql_fetch_assoc($result))
		{
			echo '<tr>';
				echo '<td>';
					echo "<h3><a href=\"category.php?id=".$row['cat_id']."\">  ".$row['cat_name']."</a></h3> ".$row['cat_description']."";
				echo '</td>';
				echo '<td>';
							echo '<a href="topic.php?id=">Topic subject</a>';
				echo '</td>';
			echo '</tr>';
		}
		echo "</table>";
	}
}
echo "<a href=\"new_category.php\">Create a category</a>";

do_html_footer();
?>
