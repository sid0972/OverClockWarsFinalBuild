<?php
session_start();
require_once('bookmark_fns.php');
check_valid_user();
$aname=mysql_real_escape_string($_POST['aname']);
$occupation=mysql_real_escape_string($_POST['occupation']);
$location=mysql_real_escape_string($_POST['location']);

 $name = mysql_real_escape_string($_SESSION['valid_user']);
$expr='/^[a-zA-Z]{1,27}$/';

if(strlen($aname)>27)
{
	echo "<center><br><br><br><br><br>Thats a long name (no offence). Please shorten it.";
	
	echo "<br><br><br><a href=\"about_me_form.php\">Click here To go back and try again.</a></center>";break;
	header("location:about_me_form.php");
}
else 
{ 
	echo " ";
}

if(strlen($location)>27)
{
	echo "<center><br><br><br><br>Thats a long name for a location. Please shorten it.";
	break;
	echo "<br><br><br><a href=\"about_me_form.php\">Click here To go back and try again.</a></center>";
	header("location:about_me_form.php");
}
else 
{ 
	echo " ";
}
	
if(strlen($occupation)>27)
{
	echo "<center><br><br><br><br>Thats a long name for an occupation. Please shorten it.";
	break;
	echo "<br><br><br><a href=\"about_me_form.php\">Click here To go back and try again.</a></center>";
	header("location:about_me_form.php");
}
else 
{ 
	echo " ";
}
	
if ($aname!=NULL)
{
	
		if(preg_match($expr,$aname))
		{
		echo " ";
		}
		else
		{
		echo "<center><br><br><br><br>Please don't include numbers in your real name.";
		break;
		echo "<br><br><br><a href=\"member.php\">Click here To go back and try again.</a></center>";
		}
		
}
	else {echo " ";}


if($location!=NULL)
{
	
	if(preg_match($expr,$location))
	{
		echo " ";
	}
	else
	{
	echo "<center><br><br><br><br>Please don't include numbers in your Location.";
	break;
	echo "<br><br><br><a href=\"member.php\">Click here To go back and try again.</a></center>";
	}
}
else { echo " ";}

if($occupation!=NULL)
{
	if(preg_match($expr,$occupation))
	{
		echo " ";
	}
	else
	{
	echo "<center><br><br><br><br>Please don't include numbers in your Occupation.";
	break;
	echo "<br><br><br><a href=\"member.php\">Click here To go back and try again.</a></center>";
	}
}	else {echo " ";}

$query="update users set user_aname='".$aname."',user_location='".$location."',user_occupation='".$occupation."' where username='".$name."' ";
$result=mysql_query($query);

if($result)
{
	echo "<center><br><br><br><br>Successful, and you are being taken to homepage.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Can't wait? Click here then.</a></center>";
	
}
else
{
	echo "<center><br><br><br><br>Unsuccessful, error occured</center>".mysql_error();
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Can't wait? Click here then.</a></center>";
}
 
?>
