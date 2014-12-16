<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Member Profile');
check_valid_user();
do_html_left();
do_html_right();



	$name = mysql_real_escape_string($_GET['id']);
	$query="select user_aname, user_email, user_occupation,user_location from users where username='".mysql_real_escape_string($name)."'";
	$result=mysql_query($query);
	if($result)
	{
	$row = mysql_fetch_array($result);
	echo "<center><p class=\"text\">This is the profile of <em>".$name."</em>.</p>";
	
	if(htmlspecialchars($row['user_aname'])!=NULL)
	{
		echo "<p class=\"text\"><em>".$name."</em>'s actual name is ".htmlspecialchars($row['user_aname']).".&nbsp; ";
	}
	else
	{
		echo "<p class=\"text\"><em>".$name."</em> does not want to share his name.&nbsp; ";
	}
	
	if(htmlspecialchars($row['user_location'])!=NULL)
	{
		echo " <em>".$name."</em> belongs to ".htmlspecialchars($row['user_location']).". &nbsp; ";
	}
	else
	{
		echo " <em>".$name."</em> does not want to share his location.&nbsp; ";
	} 
	
	if(htmlspecialchars($row['user_occupation'])!=NULL)
	{
		echo " <em>".$name."</em>'s occupation is ".htmlspecialchars($row['user_occupation']).".&nbsp;</p>";
	}
	else
	{
		echo " <em>".$name."</em> does not want to share his occupation.&nbsp; </p>";
	}
	
	echo "<p class=\"text\">Browse through <a class=\"generic\" href=\"all_ocs.php?id=".$name."\">".$name."'s overclocks,</a>";
	echo "  &nbsp;Or have a look at <a class=\"generic\" href=\"systems.php?id=".$name."\">".$name."'s system</a></p></center>";
}
?>
<br>
<p class="text" align="center">Or say something to <em><?php echo  $name ?></em></p><br>
<center>
<form action="post_insert.php?id=<?php echo $name ?>" method="post">

	
	<textarea size="40" rows="5" cols="80" name="text_post" maxlength="500"></textarea><br><br>
	<input type="submit" value="post">
	<input type="reset" value="reset">

</form></center>
<?php
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 8; 
$sql = "SELECT post_by,post_content,post_date FROM posts where username='".$name."' ORDER BY post_date desc LIMIT ".$start_from.", 8"; 
$rs_result = mysql_query ($sql); 
?> 
<table  border="1" width="66%"  align="center">
<tr><th align="center" class="text">User</td><th align="center" class="text">Post</td><th align="center" class="text">Date</td></tr>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td class="text" align="center"><a class="generic" href="profile.php?id=<? echo htmlspecialchars($row['post_by']); ?> "><?php echo htmlspecialchars($row['post_by']); ?></a></td>
            <td class="text" align="center" style="word-break:break-all;"><? echo htmlspecialchars($row['post_content']); ?></td>
            <td class="text" align="center"><? echo htmlspecialchars($row['post_date']); ?></td>
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
$total_pages = ceil($total_records / 8); 
echo "<center>";
  if ($total_pages < 2) { echo " "; }
else
{
  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a class=\"leftmenu\" href='profile.php?page=".$i."&id=".$name."'>".$i."</a> "; 
}
echo "</center>";
}
do_html_footer();
?>
