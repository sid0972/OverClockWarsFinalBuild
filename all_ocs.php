<?php
session_start();
require_once('bookmark_fns.php');
$name=mysql_real_escape_string($_GET['id']);

do_html_header('All the  Overclocks');
check_valid_user();
do_html_left();
do_html_right();
echo "name is ".$name."<br>";

$superpi="select score,link from superpi where username='$name'";
$superpires=mysql_query($superpi);
$superpirow=mysql_fetch_array($superpires);
$myvar1 = stripslashes($superpirow['link']);

$aquamark="select score,link from aquamark where username='$name'";
$aquamarkres=mysql_query($aquamark);
$aquamarkrow=mysql_fetch_array($aquamarkres);
$myvar2 = stripslashes($aquamarkrow["link"]);

$threed06="select score,link from 3d06 where username='$name'";
$threed06res=mysql_query($threed06);
$threed06row=mysql_fetch_array($threed06res);
$myvar3 = stripslashes($threed06row["link"]);

$threedv="select score,link from 3dv where username='$name'";
$threedvres=mysql_query($threedv);
$threedvrow=mysql_fetch_array($threedvres);
$myvar4 = stripslashes($threedvrow["link"]);

$threed11="select score,link from 3d11 where username='$name'";
$threed11res=mysql_query($threed11);
$threed11row=mysql_fetch_array($threed11res);
$myvar5 = stripslashes($threed11row["link"]);

$unigine="select score,link from unigine where username='$name'";
$unigineres=mysql_query($unigine);
$uniginerow=mysql_fetch_array($unigineres);
$myvar6 = stripslashes($uniginerow["link"]);

$android="select score,link from android where username='$name'";
$androidres=mysql_query($android);
$androidrow=mysql_fetch_array($androidres);
$myvar7 = stripslashes($androidrow["link"]);

$other="select score,link from other where username='$name'";
$otherres=mysql_query($other);
$otherrow=mysql_fetch_array($otherres);
$myvar8 = stripslashes($otherrow["link"]);
?>
<html><body>
<br><br>
<table border="1" cellspacing="7" cellpadding="5" align="center">
	<tr>
		<td>SuperPi</td>
	<?php	echo "<td> ".htmlspecialchars($superpirow['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar1\">Proof</a></td>";		?>
	
	
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Aquamark</td>
	<?php	echo "<td> ".htmlspecialchars($aquamarkrow['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar2\">Proof</a></td>";		?>
	
		
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>3DMark 06</td>
	<?php	echo "<td> ".htmlspecialchars($threed06row['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar3\">Proof</a></td>";		?>
	
		
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>3DMark Vantage</td>
	<?php	echo "<td> ".htmlspecialchars($threedvrow['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar4\">Proof</a></td>";		?>
	
		
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>3DMark 11</td>
	<?php	echo "<td> ".htmlspecialchars($threed11row['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar5\">Proof</a></td>";		?>
	
		
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Unigine Heaven</td>
	<?php	echo "<td> ".htmlspecialchars($uniginerow['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar6\">Proof</a></td>";		?>
	
		
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Other</td>
	<?php	echo "<td> ".htmlspecialchars($otherrow['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar7\">Proof</a></td>";		?>
	
		
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Android</td>
	<?php	echo "<td> ".htmlspecialchars($androidrow['score'])." </td>";	?>
	<?php	echo "<td><a href=\"$myvar8\">Proof</a></td>";		?>
	
		
	</tr>
</table>

<form action="insert_com.php?id=<?php echo $name ?>" method="post">
	<label>Comment</label><input type="text" name="comment" />
	<input type="submit" value="Post" />
</form><br><br>
<?php 
$sql = "SELECT COUNT(comment) FROM comments where username='".$name."'"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 10); 
  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='all_ocs.php?page=".$i."&id=".$name."'>".$i."</a> "; 
}; 



if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10; 
$sql = "select comment,com_by,com_time from comments where username='".$name."' order by com_time desc LIMIT ".$start_from.", 10"; 
$rs_result = mysql_query ($sql); 
?> 
<table  border="1">
<tr><td>User</td><td>Post</td><td>Date</td></tr>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><? echo htmlspecialchars($row['com_by']); ?></td>
            <td><? echo htmlspecialchars($row['comment']); ?></td>
            <td><? echo htmlspecialchars($row['com_time']); ?></td>
            </tr>
<?php 
}
?> </table>
</body></html>
<?php
do_html_footer();
?>
