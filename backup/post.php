<?php
session_start();
require_once('bookmark_fns.php');
do_html_header('Post');
check_valid_user();
do_html_left();
do_html_right();
$name=mysql_real_escape_string($_SESSION['valid_user']);
?>
<html>
<body>
<center>
<form action="post_self_insert.php?id=<?php echo $name ?>" method="post">

	
	<textarea size="40" rows="8" cols="80" name="text_post" maxlength="500"></textarea><br><br>
	<input type="submit" value="post">
	<input type="reset" value="reset">

</form>
</center>
<?php 

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10; 
$sql = "SELECT post_by,post_content,post_date FROM posts where username='".$name."' ORDER BY post_date desc LIMIT ".$start_from.", 10"; 
$rs_result = mysql_query ($sql); 
?> 
<table  border="1">
<tr><td>User</td><td>Post</td><td>Date</td></tr>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><? echo htmlspecialchars($row['post_by']); ?></td>
            <td><? echo htmlspecialchars($row['post_content']); ?></td>
            <td><? echo htmlspecialchars($row['post_date']); ?></td>
            </tr>
<?php 
}
?> 
</table>
<?php 
$sql = "SELECT COUNT(post_content) FROM posts where username='".$name."'"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 10); 

if ($total_pages < 2) { echo " "; }
else
{
	echo "Page ";

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='post.php?page=".$i."'>".$i."</a> "; 
}
}


do_html_footer(); ?>
</html>
