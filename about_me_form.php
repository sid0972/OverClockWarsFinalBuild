<?php
session_start();
require_once('bookmark_fns.php');
/*
 * about_me_form.php
 * 
 * Copyright 2012 ART <art@WarMachine>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>About Me</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.21" />
</head>

<body>
<?php
do_html_header('About Me');
check_valid_user();
do_html_left();
do_html_right();
?>
<br><br><br>
	<form action="about_me_insert.php" method="post">
		<table border="0" align="center" cellspacing="20" cellpadding="15" style="font-family: arial; color: black; font-weight: bold;font-size:12pt">
			<tr>
				<th class="th">Name</th>
				<td class="text"><input type="text" name="aname" size="20" maxlength="28" /></td>
			</tr>
			<tr>
				<th class="th">Location</th>
				<td class="text"><input type="text" name="location" size="20" maxlength="28" /></td>
			</tr>
			<tr>
				<th class="th">Occupation</th>
				<td class="text"><input type="text" name="occupation" size="20" maxlength="28" /></td>
			</tr>
			
			<tr><td colspan="2" align="center"><input type="submit" value="save" /></td></tr>
		</table>
	</form>
	<?php
	do_html_footer();
?>
</body>

</html>
