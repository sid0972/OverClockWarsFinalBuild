<?php
session_start();
require_once('bookmark_fns.php');
do_html_header('Details of your System');
check_valid_user();
do_html_left();
do_html_right();
?>
<table align="center" class="text" cellspacing="10" >
<form action="system_insert.php " method="post">
	<tr><td><label>Processor </label></td><td><input type="text" size="15" maxlength="25" name="cpu"/></td>
	<td><label>Motherboard </label></td><td><input type="text" size="15" maxlength="25" name="mobo"/></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>RAM </label></td><td><input type="text" size="15" maxlength="25" name="ram"/></td>
	<td><label>Graphics Card </label></td><td><input type="text" size="15" maxlength="25" name="gcard"/></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>Hard Disk </label></td><td><input type="text" size="15" maxlength="25" name="hdd"/></td>
	<td><label>Power Supply</label></td><td><input type="text" size="15" maxlength="25" name="psu"/></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>Mouse </label></td><td><input type="text" size="15" maxlength="25" name="mouse"/></td>
	<td><label>Keyboard </label></td><td><input type="text" size="15" maxlength="25" name="keyboard"/></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>Monitor </label></td><td><input type="text" size="15" maxlength="25" name="monitor"/></td>
	<td><label>Speakers </label></td><td><input type="text" size="15" maxlength="25" name="speakers"/></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>Cabinet </label></td><td><input type="text" size="15" maxlength="25" name="cabinet"/></td>
	<td><label>Cooling </label></td><td><input type="text" size="15" maxlength="25" name="cooling"/></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>Operating system </label></td><td><input type="text" size="15" maxlength="25" name="os"/></td>
	<td><label>Mouse Mats </label></td><td><input type="text" size="15" maxlength="25" name="mouse_pad"/></td></tr>
</table>
	<center><input type="Submit" value="Save" /></center>
</form>
<?php
do_html_footer();
?>
