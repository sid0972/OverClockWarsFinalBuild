<?php
session_start();
require_once('bookmark_fns.php');
check_valid_user();
/*$conn=db_connect();
$result=$conn->query("insert into system(cpu,mobo,ram,gcard,hdd,psu,mouse,keyboard,monitor,speaker,cabinet,cooling,mouse_pad,os,username) values 
					('".$_POST['cpu']."','".$_POST['mobo']."','".$_POST['ram']."','".$_POST['gcard']."','".$_POST['hdd']."','".$_POST['psu']."','".$_POST['mouse']."','".$_POST['keyboard']."',
					 '".$_POST['monitor']."','".$_POST['speaker']."','".$_POST['cabinet']."','".$_POST['cooling']."','".$_POST['os']."','".$_POST['mouse_pad']."','".$_SESSION['valid_iser']."'");*/

$cpu=mysql_real_escape_string($_POST['cpu']);
$mobo=mysql_real_escape_string($_POST['mobo']);
$ram=mysql_real_escape_string($_POST['ram']);
$gcard=mysql_real_escape_string($_POST['gcard']);
$hdd=mysql_real_escape_string($_POST['hdd']);
$psu=mysql_real_escape_string($_POST['psu']);
$mouse=mysql_real_escape_string($_POST['mouse']);
$keyboard=mysql_real_escape_string($_POST['keyboard']);
$monitor=mysql_real_escape_string($_POST['monitor']);
$speaker=mysql_real_escape_string($_POST['speaker']);
$cabinet=mysql_real_escape_string($_POST['cabinet']);
$cooling=mysql_real_escape_string($_POST['cooling']);
$mouse_pad=mysql_real_escape_string($_POST['mouse_pad']);
$os=mysql_real_escape_string($_POST['os']);
$name=mysql_real_escape_string($_SESSION['valid_user']);

if(!check_system($cpu))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Processor? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($mobo))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Motherboard? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($ram))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a RAM? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($gcard))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Graphics Card? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($hdd))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Hard Disk Drive? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($psu))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Power Supply Unit? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($mouse))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Mouse? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($keyboard))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Keyboard? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($monitor))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Monitor? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($speaker))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Speaker? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($cabinet))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Cabinet? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($cooling))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for a Cooling Devicxe? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(!check_system($os))
{
	echo "<center><br><br><br><br>Are you sure that's a correct name for an Operating System? ";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}
else
{
	echo  " ";
}

if(check_system_length($cpu))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for processor. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($mobo))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for motherboard. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($ram))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for RAM. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($gcard))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Graphics Card. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($hdd))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Hard Disk Drive. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($psu))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Power Supply Unit. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($mouse))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Mouse. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($keyboard))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for keyboard. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($monitor))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Monitor. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($speaker))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Speaker. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}


if(check_system_length($cabinet))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Cabinet. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}


if(check_system_length($cooling))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Cooling System. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

if(check_system_length($os))
{
	echo " ";
}
else 
{ 
	echo "<center><br><br><br><br>Maximum Character limit exceeded for Operating System. Please make sure input is of less than 30 characters.</center>";
	header("location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Please go back and try again.</a></center>";
}

$query="update system set cpu='".$cpu."' , mobo='".$mobo."' ,ram='".$ram."',gcard='".$gcard."',hdd='".$hdd."',psu='".$psu."',
		mouse='".$mouse."',keyboard='".$keyboard."',monitor='".$monitor."',speaker='".$speaker."',cabinet='".$cabinet."',
		cooling='".$cooling."',mouse_pad='".$os."',os='".$mouse_pad."' where username='".$name."'";
					 
$result=mysql_query($query);

if(!$result)
{
	echo "<center><br><br><br><br>uh oh, tyre punctured.</center>";
	header("Location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Click here if you cant wait</a></center>";
}
else
{
	echo "<center><br><br><br><br>Values updated successfully</center>";
	header("Location:member.php");
	echo "<center><br><br><br><a href=\"member.php\">Click here if you cant wait</a></center>";
}
?>
