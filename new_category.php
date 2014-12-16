<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Categories');
check_valid_user();
do_html_left();
do_html_right();
?>
<form method="post" action="create_cat.php">
 	Category name: <input type="text" name="cat_name" /><br><br><br><br>
 	Category description: <textarea name="cat_description" rows="10" cols="30"/></textarea>
	<input type="submit" value="Add category" />
 </form>
<?php
do_html_footer();
?>
