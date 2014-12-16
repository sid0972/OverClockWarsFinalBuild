<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('System');
check_valid_user();
do_html_left();
do_html_right();

user_system();

do_html_footer();
?>
