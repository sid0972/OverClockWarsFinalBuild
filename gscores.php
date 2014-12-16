<?php
session_start();

require_once('bookmark_fns.php');
do_html_header('Scores in Database');
check_valid_user();
do_html_left();
do_html_right();
?>
<center>
<br><br>
<table border="0" cellspacing="5" cellpadding="5">
	<tr>
		<td><a href="g_superpi.php ">SuperPi</a><br><br></td>
		<td><a href="g_aquamark ">Aquamark</a><br><br></td>
	</tr>
	<tr>
		<td><a href="g_3d06.php ">3DMark 06</a><br><br></td>
		<td><a href="g_3dv.php ">3DMark Vantage</a><br><br></td>
	</tr>
	<tr>
		<td><a href="g_3d11.php ">3DMark Extreme</a><br><br></td>
		<td><a href="g_unigine.php ">Unigine Heaven</a><br><br></td>
	</tr>
	<tr>
		<td><a href="g_other.php ">Other</a><br><br></td>
		<td><a href="g_android.php ">Android</a><br><br></td>
	</tr>
</table>
</center>

<?php
do_html_footer();
?>
