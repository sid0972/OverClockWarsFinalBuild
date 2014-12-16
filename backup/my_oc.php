<?php
session_start();
// include function files for this application
require_once('bookmark_fns.php');

$name=$_SESSION['valid_user'];
//create short variable names


do_html_header('Overclocks');
check_valid_user();
do_html_left();
do_html_right();

mysql_connect("localhost","root","why");
mysql_select_db("testdb");

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

<br><br>
<table border="1" cellspacing="7" cellpadding="5" align="center">
	<tr>
		<td>SuperPi</td>
	<?php	echo "<td> ".$superpirow['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar1\">Proof</a></td>";		?>
	
	<td><a href="oc_superpi.php ">Edit</a></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Aquamark</td>
	<?php	echo "<td> ".$aquamarkrow['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar2\">Proof</a></td>";		?>
	
		<td><a href="oc_aquamark.php ">Edit</a></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>3DMark 06</td>
	<?php	echo "<td> ".$threed06row['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar3\">Proof</a></td>";		?>
	
		<td><a href="oc_3d06.php ">Edit</a></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>3DMark Vantage</td>
	<?php	echo "<td> ".$threedvrow['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar4\">Proof</a></td>";		?>
	
		<td><a href="oc_3dv.php ">Edit</a></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>3DMark 11</td>
	<?php	echo "<td> ".$threed11row['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar5\">Proof</a></td>";		?>
	
		<td><a href="oc_3d11.php ">Edit</a></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Unigine Heaven</td>
	<?php	echo "<td> ".$uniginerow['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar6\">Proof</a></td>";		?>
	
		<td><a href="oc_uh.php ">Edit</a></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Other</td>
	<?php	echo "<td> ".$otherrow['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar7\">Proof</a></td>";		?>
	
		<td><a href="oc_other.php ">Edit</a></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>Android</td>
	<?php	echo "<td> ".$androidrow['score']." </td>";	?>
	<?php	echo "<td><a href=\"$myvar8\">Proof</a></td>";		?>
	
		<td><a href="oc_and.php ">Edit</a></td>
	</tr>
</table><br><br>
<form action="insert_com.php?id=<?php echo $name ?>" method="post">
	<label>Comment</label><input type="text" name="comment" />
	<input type="submit" value="Post" />
</form><br><br>
<?php
$query="select comment,com_by,com_time from comments where username='".$name."' order by com_time desc";
$com=mysql_query($query);
echo "<table border=\"1\">";
while($row=mysql_fetch_array($com))
{
	echo "<tr><th>User</th><th>Comment</th><th>Time</th></tr>";
	echo "<tr><td>".$row['com_by']."</td><td>".$row['comment']."</td><td>".$row['com_time']."</td></tr>";
}
echo "</table>";
echo "<body></html>";
?>

<?php
do_html_footer();
?>
