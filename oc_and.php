<?php

// include function files for this application
require_once('bookmark_fns.php');
session_start();


do_html_header('AnTutu');
check_valid_user();
do_html_left();
do_html_right();

echo "<br><br><br><br><br><br>";
echo "<center><em><b>Android</b></em></center>";
?>
<br>
<form action="oc_and_insert.php" method="post">
	<center><input type="text" name="score" size="9" maxlength="9">
	<br><br>
	
	
	<br>
	<p>Links to photo and video</p><br>
	<textarea rows="4" cols="50" name="link"></textarea><br><br>
	<input type="submit" value="Save">
	</center>
</form>


<?php

do_html_footer();
?>
