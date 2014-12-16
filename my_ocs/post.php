<?php
session_start();
require_once('bookmark_fns.php');
do_html_header('post');
check_valid_user();
do_html_left();
do_html_right();
$name=$_SESSION['valid_user'];
?>
<html>
<body>
<center>
<form action="post_insert.php" method="post">

	
	<textarea size="40" rows="8" cols="80" name="text_post"></textarea><br><br>
	<input type="submit" value="post">
	<input type="reset" value="reset">

</form>
</center>
<?php
mysql_connect("localhost","root","why");
mysql_select_db("testdb");
$query="select post_content,post_by,post_date from posts where username='".$name."' order by post_date desc";
$result=mysql_query($query);
echo "<table align=\"center\" border=\"1\">";
	while($data=mysql_fetch_array($result))
		{
		
			echo "<tr><th>User</th><th>Post</th></tr>";
			echo "<tr><td>".$data['post_by']."</td><td>".$data['post_content']."</td><td>".$data['post_date']."</td></tr>";
		}
echo "</table>";
do_html_footer(); ?>
</html>
