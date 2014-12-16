<?php

function do_html_header($title) {
  // print an HTML header
?>
  <html>
  <head>
    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href="style1.css" />
  </head>
  <body>
  <div id="container">
	<div id="header">
		
	</div>
<?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_footer() {
  // print an HTML footer
?>
  <div id="footer">
		<p align="center" style="color:white">some other links, professional looking, goes here</p>
	</div>
<?php
}

function do_html_heading($heading) {
  // print heading
?>
  <h2><?php  $heading;?></h2>
<?php
}

function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
<?php
}

function do_html_left()
{
?>
	<div id="leftmenu">
		<ul class="leftmenu">
			<br /><br /><br />
			<br />
			<li class="leftmenu"><a class="leftmenu" href="post.php?page=1 ">Posts</a></li><br />
			<li class="leftmenu"><a class="leftmenu" href="my_oc.php">My Overclocks</a></li><br />
			<li class="leftmenu"><a class="leftmenu" href="categories.php ">Discussions</a></li><br />
			<li class="leftmenu"><a class="leftmenu" href="gscores.php">Global Scores</a></li><br />
			<li class="leftmenu"><a class="leftmenu" href="user_list.php  ">Users</a></li><br />
			<li class="leftmenu"><a class="leftmenu" href="member.php">Litle Bit About me</a></li><br />
			<li class="leftmenu"><a class="leftmenu" href="logout.php">Logout</a></li><br />
		</ul>
	</div>
<?php
}

function do_html_right()
{
?>
	<div id="rightmenu">
		<ul class="leftmenu">
			<br /><br /><br />
			<br />
			<li>Notifications, Friendship Requests</li>
		<br />
			<li>Current Throwdowns</li>
		<br />
			<li>Scores according to user's cards</li>
		<br />
			<li>New cards from shops listed</li>
	
		</ul>
	</div>
<?php
}

function display_site_info() {
  // display some marketing info
?>
  <ul>
  <li>Store your scores online with us!</li>
  <li>See what other users use!</li>
  <li>Share your favorite links with others!</li>
  </ul>
<?php
}

function display_login_form() {
?>
  
  <form method="post" action="member.php">
  <table bgcolor="" align="center">
   <tr>
     <td colspan="2" align="center">Log in<br></td>
   <tr>
     <td><br>Username:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>Password:</td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Log in"/></td></tr>
   <tr>
     <td colspan="2" align="center"><a href="forgot_form.php">Forgot your password?</a></td>
   </tr>
   
 </table></form>
 <p align="center"><a href="register_form.php">Register</a></p>
<?php
}

function display_registration_form() {
?>
 <form method="post" action="register_new.php">
 <h3 align="center">Registration</h3>
 <table align="Center" border="0">
   <tr>
     <td>Email address:</td>
     <td><input type="text" name="email" size="30" maxlength="100"/></td></tr>
   <tr>
     <td>Preferred username <br />(max 16 chars):</td>
     <td valign="top"><input type="text" name="username"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>Password <br />(between 6 and 16 chars):</td>
     <td valign="top"><input type="password" name="passwd"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>Confirm password:</td>
     <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
   <tr>
     <td colspan=2 align="center">
     <input type="submit" value="Register"></td></tr>
 </table></form>
<?php

}

function display_user_urls($url_array) {
  // display the table of URLs

  // set global variable, so we can test later if this is on the page
  global $bm_table;
  $bm_table = true;
?>
  <br />
  <form name="bm_table" action="delete_bms.php" method="post">
  <table width="300" cellpadding="2" cellspacing="0">
  <?php
  $color = "#cccccc";
  echo "<tr bgcolor=\"".$color."\"><td><strong>Bookmark</strong></td>";
  echo "<td><strong>Delete?</strong></td></tr>";
  if ((is_array($url_array)) && (count($url_array) > 0)) {
    foreach ($url_array as $url)  {
      if ($color == "#cccccc") {
        $color = "#ffffff";
      } else {
        $color = "#cccccc";
      }
      //remember to call htmlspecialchars() when we are displaying user data
      echo "<tr bgcolor=\"".$color."\"><td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td>
            <td><input type=\"checkbox\" name=\"del_me[]\"
                value=\"".$url."\"/></td>
            </tr>";
    }
  } else {
    echo "<tr><td>No bookmarks on record</td></tr>";
  }
?>
  </table>
  </form>
<?php
}

function display_user_menu() {
  // display the menu options on this page
?>
<hr />
<a href="member.php">Home</a> &nbsp;|&nbsp;
<a href="add_bm_form.php">Add BM</a> &nbsp;|&nbsp;
<?php
  // only offer the delete option if bookmark table is on this page
  global $bm_table;
  if ($bm_table == true) {
    echo "<a href=\"#\" onClick=\"bm_table.submit();\">Delete BM</a> &nbsp;|&nbsp;";
  } else {
    echo "<span style=\"color: #cccccc\">Delete BM</span> &nbsp;|&nbsp;";
  }
?>
<a href="change_passwd_form.php">Change password</a>
<br />
<a href="recommend.php">Recommend URLs to me</a> &nbsp;|&nbsp;
<a href="logout.php">Logout</a>
<hr />

<?php
}

function display_add_bm_form() {
  // display the form for people to ener a new bookmark in
?>
<form name="bm_table" action="add_bms.php" method="post">
<table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
<tr><td>New BM:</td>
<td><input type="text" name="new_url" value="http://"
     size="30" maxlength="255"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="Add bookmark"/></td></tr>
</table>
</form>
<?php
}

function display_password_form() {
  // display html change password form
?>
   <br />
   <form action="change_passwd.php" method="post">
   <table align="center">
   <tr><td>Old password:</td>
       <td><input type="password" name="old_passwd"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>New password:</td>
       <td><input type="password" name="new_passwd"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>Repeat new password:</td>
       <td><input type="password" name="new_passwd2"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan="2" align="center">
       <input type="submit" value="Change password"/>
   </td></tr>
   </table>
   <br />
<?php
}

function display_forgot_form() {
  // display HTML form to reset and email password
?>
   <br />
   <form action="forgot_passwd.php" method="post">
   <table align="center">
   <tr><td>Enter your username</td>
       <td><input type="text" name="username" size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan=2 align="center">
       <input type="submit" value="Change password"/>
   </td></tr>
   </table>
   <br />
<?php
}

function display_recommended_urls($url_array) {
  // similar output to display_user_urls
  // instead of displaying the users bookmarks, display recomendation
?>
  <br />
  <table width="300" cellpadding="2" cellspacing="0">
<?php
  $color = "#cccccc";
  echo "<tr bgcolor=\"".$color."\">
        <td><strong>Recommendations</strong></td></tr>";
  if ((is_array($url_array)) && (count($url_array)>0)) {
    foreach ($url_array as $url) {
      if ($color == "#cccccc") {
        $color = "#ffffff";
      } else {
        $color = "#cccccc";
      }
      echo "<tr bgcolor=\"".$color."\">
            <td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td></tr>";
    }
  } else {
    echo "<tr><td>No recommendations for you today.</td></tr>";
  }
?>
  </table>
<?php
}


?>
