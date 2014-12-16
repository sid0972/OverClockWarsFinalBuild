<?php
  // include function files for this application
  session_start();
  require_once('bookmark_fns.php');

  //create short variable names
  $email=mysql_real_escape_string($_POST['email']);
  $username=mysql_real_escape_string($_POST['username']);
  $passwd=mysql_real_escape_string($_POST['passwd']);
  $passwd2=mysql_real_escape_string($_POST['passwd2']);
  // start session which may be needed later
  // start it now because it must go before headers
  
  try   {
    // check forms filled in
    if (!filled_out($_POST)) {
      throw new Exception('You have not filled the form out correctly - please go back and try again.');
    }

    // email address not valid
    if (!valid_email($email)) {
      throw new Exception('That is not a valid email address.  Please go back and try again.');
    }

    // passwords not the same
    if ($passwd != $passwd2) {
      throw new Exception('The passwords you entered do not match - please go back and try again.');
    }

    // check password length is ok
    // ok if username truncates, but passwords will get
    // munged if they are too long.
    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
      throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
    }

    // attempt to register
    // this function can also throw an exception
    register($username, $email, $passwd);
    regscores($username);
    regspi($username);
    regaq($username);
    reg3d06($username);
    reg3dv($username);
    reg3d11($username);
    reguh($username);
    regother($username);
    regandroid($username);
    regsystem($username);
    // register session variable
    $_SESSION['valid_user'] = $username;

    // provide link to members page
    do_html_header();
    echo '<p align="center"></p>Your registration was successful.</p>';
    do_html_url('member.php', 'Go to members page');
	header("location:member.php");
   // end page
   
  }
  catch (Exception $e) {
     do_html_header('Problem:');
     echo $e->getMessage();
     do_html_footer();
     exit;
  }
?>
