<?php

// include function files for this application
require_once('bookmark_fns.php');
session_start();

do_html_header('Friends');
check_valid_user();
do_html_left();
do_html_right();
// get the bookmarks this user has saved

// give menu of options
echo "<center>your friends list will be displayed here, its just that i dont know how to implement this thing</center>";

do_html_footer();
?>
