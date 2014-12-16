<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Members');
check_valid_user();
do_html_left();
do_html_right();

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10; 
$sql = "SELECT user_aname,username,user_location,user_occupation FROM users LIMIT ".$start_from.", 10"; 
$rs_result = mysql_query ($sql); 

echo "<table align=\"center\" width=\"66%\">";
echo "<tr><th>User</th><th>Real Name</th><th>Location</th><th>Occupation</th></tr>";
while($row=mysql_fetch_array($rs_result))
{

	 echo "<tr><td><a href=\"profile.php?id=".$row['username']."\">".$row['username']."</a></td>";
	 echo "<td>".$row['user_aname']."</td>";
	 echo "<td>".$row['user_location']."</td>";
	 echo "<td>".$row['user_occupation']."</td></tr>";
	 echo "<tr><td><br></td></tr>";
	 
}
echo "</table>";

$sql = "SELECT COUNT(username) FROM users "; 
$rs_results = mysql_query($sql); 
$row = mysql_fetch_row($rs_results); 
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


if(!$rs_result) 
{
	echo "<center><br><br><br><br>No users.This is one boring place.".mysql_error();
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
do_html_footer();
?>

