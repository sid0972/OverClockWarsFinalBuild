<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('All SuperPi Scores in Database');
check_valid_user();
do_html_left();
do_html_right();

function superpi()
{
	$query="select * from superpi";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();

}

function aquamark()
{
	$query="select * from aquamark";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();

}

function threed06()
{
	$query="select * from 3d06";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();

}

function threedv()
{
	$query="select * from 3dv";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();

}

function threed11()
{
	$query="select * from 3d11";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();

}

function other()
{
	$query="select * from other";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();

}

function android()
{
	$query="select * from android";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();

}

function unigine()
{
	$query="select * from unigine";
	$result=mysql_query($query);
		
	?>
	<html><body>
		<br><br><br>
		<table align="center" border="1" cellspacing="10" cellpadding="10">
			<tr><th>Name</th><th>Score</th><th>Link</th></tr>
		<?php
	while($var=mysql_fetch_array($result))
	{
		$proof = htmlspecialchars(stripslashes($var['link']));
		echo "<tr><td>".htmlspecialchars($var['username'])."</td>";
		echo "<td>".htmlspecialchars($var['score'])."</td>";
		echo "<td><a href=\"$proof\">Link</a></td></tr>";
	}
	echo "</table>";
do_html_footer();
}

?>
