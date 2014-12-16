<?php

require_once('db_fns.php');
require_once('db.php');

function register($username, $email, $password) {
// register new person with db
// return true or error message

  // connect to db
  $conn = db_connect();

  // check if username is unique
  $result = $conn->query("select * from users where username='".$username."'");
  if (!$result) {
    throw new Exception('Could not execute query');
  }

  if ($result->num_rows>0) {
    throw new Exception('That username is taken - please go back and choose another one.');
  }

  // if ok, put in db
  $result = $conn->query("insert into users (username,user_pass,user_email) values
                         ('".$username."', sha1('".$password."'), '".$email."')");
  if (!$result) {
    throw new Exception('Could not register you in database - please try again later.');
  }

  return true;
}

function login($username, $password) {
// check username and password with db
// if yes, return true
// else throw exception

  // connect to db
  $conn = db_connect();
if (!preg_match('/^[a-zA-Z0-9_]{1,32}$/', $username))
{	echo "Invalid username, should contain words,numbers,underscore and should be of maximum 32 characters.";
break;
echo "<a href=\"login.php\">Click here</a> to try again.";
}

if (strlen($pass) > 40)
{	echo "Password too long";
break;
echo "<a href=\"login.php\">Click here</a> to try again.";
}
  // check if username is unique
  $result = $conn->query("select * from users
                         where username='".$username."'
                         and user_pass = sha1('".$password."')");
  if (!$result) {
     throw new Exception('Could not log you in.');
  }

  if ($result->num_rows>0) {
     return true;
  } else {
     throw new Exception('Could not log you in.');
  }
}

function check_valid_user() {
// see if somebody is logged in and notify them if not
  if (isset($_SESSION['valid_user']))  {
      echo "YoYo ".$_SESSION['valid_user'].".<br />";
  } else {
     // they are not logged in
     do_html_heading('Problem:');
     echo 'You are not logged in.<br />';
     do_html_url('login.php', 'Login');
     do_html_footer();
     exit;
  }
}

function change_password($username, $old_password, $new_password) {
// change password for username/old_password to new_password
// return true or false

  // if the old password is right
  // change their password to new_password and return true
  // else throw an exception
  login($username, $old_password);
  $conn = db_connect();
  $result = $conn->query("update users
                          set user_pass = sha1('".$new_password."')
                          where username = '".$username."'");
  if (!$result) {
    throw new Exception('Password could not be changed.');
  } else {
    return true;  // changed successfully
  }
}

function get_random_word($min_length, $max_length) {
// grab a random word from dictionary between the two lengths
// and return it

   // generate a random word
  $word = '';
  // remember to change this path to suit your system
  $dictionary = '/usr/dict/words';  // the ispell dictionary
  $fp = @fopen($dictionary, 'r');
  if(!$fp) {
    return false;
  }
  $size = filesize($dictionary);

  // go to a random location in dictionary
  $rand_location = rand(0, $size);
  fseek($fp, $rand_location);

  // get the next whole word of the right length in the file
  while ((strlen($word) < $min_length) || (strlen($word)>$max_length) || (strstr($word, "'"))) {
     if (feof($fp)) {
        fseek($fp, 0);        // if at end, go to start
     }
     $word = fgets($fp, 80);  // skip first word as it could be partial
     $word = fgets($fp, 80);  // the potential password
  }
  $word = trim($word); // trim the trailing \n from fgets
  return $word;
}

function reset_password($username) {
// set password for username to a random value
// return the new password or false on failure
  // get a random dictionary word b/w 6 and 13 chars in length
  $new_password = get_random_word(6, 13);

  if($new_password == false) {
    throw new Exception('Could not generate new password.');
  }

  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  $rand_number = rand(0, 999);
  $new_password .= $rand_number;

  // set user's password to this in database or return false
  $conn = db_connect();
  $result = $conn->query("update users
                          set user_pass = sha1('".$new_password."')
                          where username = '".$username."'");
  if (!$result) {
    throw new Exception('Could not change password.');  // not changed
  } else {
    return $new_password;  // changed successfully
  }
}

function notify_password($username, $password) {
// notify the user that their password has been changed

    $conn = db_connect();
    $result = $conn->query("select user_email from users
                            where username='".$username."'");
    if (!$result) {
      throw new Exception('Could not find email address.');
    } else if ($result->num_rows == 0) {
      throw new Exception('Could not find email address.');
      // username not in db
    } else {
      $row = $result->fetch_object();
      $email = $row->email;
      $from = "From: OverclockWars \r\n";
      $mesg = "Your password has been changed to ".$password."\r\n"
              ."Please change it next time you log in.\r\n";

      if (mail($email, 'Login information', $mesg, $from)) {
        return true;
      } else {
        throw new Exception('Could not send email.');
      }
    }
}
function about_me_inserts($aname,$location,$occupation,$username)
{
	$conn=db_connect();
 $result=$conn->query("update users set user_aname='".$aname."', user_location='".$location."', user_occupation='".$occupation."' where username='".$username."' ");
 
 if(!$result)
 {
	 echo "couldnt do it, sorry!!";
 }

	if ($result->num_rows>0) {
    throw new Exception('Duplicate Details.');
  }
else{
echo "Details saved ";}
}

function user_system()
{
	$query="select cpu,mobo,ram,gcard,hdd,psu,mouse,keyboard,monitor,speaker,cabinet,cooling,mouse_pad,os from system where username='".mysql_real_escape_string($_SESSION['valid_user'])."'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	if(!$query) { echo "not good\n"; break; }
	else
	{
	echo "<table align=\"center\" class=\"text\" cellspacing=\"12\" >";

	echo "<tr><td class=\"th\"><label>Processor </label></td><td>".htmlspecialchars($row['cpu'])."</td>";
	echo "<td class=\"th\"><label>Motherboard </label></td><td>".htmlspecialchars($row['mobo'])."</td></tr>";
	echo "<tr><td><br></td></tr>";
	echo "<tr><td class=\"th\"><label>RAM </label></td><td>".htmlspecialchars($row['ram'])."</td>";
	echo "<td class=\"th\"><label>Graphics Card </label></td><td>".htmlspecialchars($row['gcard'])."</td></tr>";
	echo "<tr><td><br></td></tr>";
	echo "<tr><td class=\"th\"><label>Hard Disk </label></td><td>".htmlspecialchars($row['hdd'])."</td>";
	echo "<td class=\"th\"><label>Power Supply</label></td><td>".htmlspecialchars($row['psu'])."</td></tr>";
	echo "<tr><td><br></td></tr>";
	echo "<tr><td class=\"th\"><label>Mouse </label></td><td>".htmlspecialchars($row['mouse'])."</td>";
	echo "<td class=\"th\"><label>Keyboard </label></td><td>".htmlspecialchars($row['keyboard'])."</td></tr>";
	echo "<tr><td><br></td></tr>";
	echo "<tr><td class=\"th\"><label>Monitor </label></td><td>".htmlspecialchars($row['monitor'])."</td>";
	echo "<td class=\"th\"><label>Speakers </label></td><td>".htmlspecialchars($row['speaker'])."</td></tr>";
	echo "<tr><td><br></td></tr>";
	echo "<tr><td class=\"th\"><label>Cabinet </label></td><td>".htmlspecialchars($row['cabinet'])."</td>";
	echo "<td class=\"th\"><label>Cooling </label></td><td>".htmlspecialchars($row['cooling'])."</td></tr>";
	echo "<tr><td><br></td></tr>";
	echo "<tr><td class=\"th\"><label>Operating system </label></td><td>".htmlspecialchars($row['os'])."</td>";
	echo "<td class=\"th\"><label>Mouse Mats </label></td><td>".htmlspecialchars($row['mouse_pad'])."</td></tr>";

	echo "</table>";
?>		
		<form action="user_system.php" method="post">
		<center><input type="Submit" value="Edit" /></center>
		</form>
		
<?php
	}

}

function about_me_tables($username)
{

$name=mysql_real_escape_string($_SESSION['valid_user']);
$query="select user_aname,user_location,user_occupation from users where username='".$name."'";
$result=mysql_query($query);

$row=mysql_fetch_array($result);

if($result===NULL) { echo "empty details"; break;}
?>
<br><br><br>
<table border="0" align="center" cellspacing="10" cellpadding="5" style="font-family: arial; color: black; font-size:11pt">
	<tr>
		<td class="th" align="center">Name	</td>
		<td class="th" align="center">Location	</td>
		<td class="th" align="center">Occupation	</td>
	</tr>
	<tr>
		<td align="center"><?php echo htmlspecialchars($row['user_aname'])."<br>";?></td>
		<td align="center"><?php echo htmlspecialchars($row['user_location'])."<br>";?></td>
		<td align="center"><?php echo htmlspecialchars($row['user_occupation'])."<br>";?></td>
	</tr>
	
	<tr align="center"><td></td>
		<td align="center"><br>
			<form action="about_me_form.php">
			<input type="submit" value="EDIT">
			</form>
		</td>
	</tr>
	</table>

<?php
}


function regscores($username)
{

	$query="insert into scores (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function regspi($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into superpi (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function regaq($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into aquamark (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function reg3d06($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into 3d06 (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function reg3dv($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into 3dv (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function reg3d11($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into 3d11 (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function reguh($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into unigine (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function regother($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into other (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}


function regandroid($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into android (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}



function regsystem($username)
{
	mysql_connect("localhost","root","why");
	mysql_select_db("testdb");
	$query="insert into system (username) values ('".mysql_real_escape_string($username)."')";
	$result=mysql_query($query);
	if(!$result)
	{
		echo "<center><br><br><br><br>Username not inserted. ";
	header("location:login.php");
	echo "<center><br><br><br><a href=\"login.php\">Please go back and try again.</a></center>";
	}
}
?>
