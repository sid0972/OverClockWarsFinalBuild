<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Your System');
check_valid_user();
do_html_left();
do_html_right();

	$query="select cpu,mobo,ram,gcard,hdd,psu,mouse,keyboard,monitor,speaker,cabinet,cooling,mouse_pad,os from system where username='".mysql_real_escape_string($_GET['id'])."'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	if(!$query) 
	{ 
		echo "<br><br><br><br><center>Could not fetch the results.";
		echo "<br><br><br><a href=\"member.php\">Click here to go to Home Page.</a>";
		header("location:member.php");
	}
	else
	{
		echo "<table align=\"center\">";
		
		echo "<tr><th>Processor</th><th>Motherboard</th><th>Ram</th><th>Graphics Card</th></tr>";
		echo "<tr><td>".htmlspecialchars($row['cpu'])."</td><td>".htmlspecialchars($row['mobo'])."</td><td>".htmlspecialchars($row['ram'])."</td><td>".htmlspecialchars($row['gcard'])."</td></tr>";
		
		echo "<tr><th>HDD</th><th>Power Supply</th><th>Mouse</th><th>Keyboard</th></tr>";
		echo "<tr><td>".htmlspecialchars($row['hdd'])."</td><td>".htmlspecialchars($row['psu'])."</td><td>".htmlspecialchars($row['mouse'])."</td><td>".htmlspecialchars($row['keyboard'])."</td></tr>";
		
		echo "<tr><th>Monitor</th><th>Speaker</th><th>Cabinet</th><th>Cooling</th></tr>";
		echo "<tr><td>".htmlspecialchars($row['monitor'])."</td><td>".htmlspecialchars($row['speaker'])."</td><td>".htmlspecialchars($row['cabinet'])."</td><td>".htmlspecialchars($row['cooling'])."</td></tr>";

		echo "<tr><th>Mouse Mat</th><th>Operating System</tr>";
		echo "<tr><td>".htmlspecialchars($row['mouse_pad'])."</td><td>".htmlspecialchars($row['os'])."</tr>";
		echo "</table>";	
	}

do_html_footer();
?>
