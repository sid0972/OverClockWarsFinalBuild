<?php
session_start();
require_once('bookmark_fns.php');

$username = $_POST['username'];
$passwd = $_POST['passwd'];

if ($username && $passwd) {
// they have just tried logging in
  try  {
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    // unsuccessful login
    do_html_header('Problem:');
    echo '<center>You could not be logged inn.
          You must be logged in to view this page.</center>';
    do_html_url('login.php', 'Login');
    do_html_footer();
    exit;
  }
}

do_html_header('Home');
check_valid_user();
do_html_left();
do_html_right();
?>
<br><br><br><br>
<center>
<ul class="leftmenu" >
	<li ><a class="generic" href="show_system.php">Your System</a><br><br></li>
	<li ><a class="generic" href="phuploader.php">Upload images</a><br><br></li>
	<li ><a class="generic" href="display_images.php">Show images</a><br><br></li>
</ul></center>

<?php
about_me_tables($username); //user_auth
do_html_footer();
?>
