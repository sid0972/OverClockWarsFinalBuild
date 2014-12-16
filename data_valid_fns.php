<?php

function filled_out($form_vars) {
  // test that each variable has a value
  foreach ($form_vars as $key => $value) {
     if ((!isset($key)) || ($value == '')) {
        return false;
     }
  }
  return true;
}

function valid_email($address) {
  // check an email address is possibly valid
  if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
    return true;
  } else {
    return false;
  }
}

function check_system($input)
{
	$expr = '/^[0-9a-zA-Z ]+$/';
		
	if(preg_match($expr,$input))
		{
				return true;
		}
		else
		{
				return false;
		}
}

function check_system_length($input)
{
	if(strlen($input)<31)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function check_url($link)
{
	
	$expr='((?:(?<!/)/(?:\w(?:%[a-f\\d]{2}|[\\w\\., -])*)*)+(?:(?:\\.\\w{1,6})?';
	if(preg_match($expr,$link))
	{
		return true;
	}	
	else
	{
		return false;
	}
}

function check_score3d($score)
{
	if(strlen($score)>5)
	{
		echo "<br><br><br><br><center>This score is first of its kind. There must have been a mistake of some kind<br> If you think this is a valid score, please contact the admin.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		break;
		//header("location:my_oc.php");
	}
	else { echo " "; }
	
	$expr='/^\d{3,5}$/';
	if(preg_match($expr,$score))
	{
		echo " ";
	}
	else
	{
		echo "<br><br><br><br><center>This score is invalid.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		
		break;
		//header("location:my_oc.php");
	}
}

function check_scoreaq($score)
{
	if(strlen($score)>6)
	{
		echo "<br><br><br><br><center>This score is first of its kind. There must have been a mistake of some kind<br> If you think this is a valid score, please contact the admin.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		break;
		//header("location:my_oc.php");
	}
	else { echo " "; }
	
	$expr='/^\d{4,6}$/';
	if(preg_match($expr,$score))
	{
		echo " ";
	}
	else
	{
		echo "<br><br><br><br><center>This score is invalid.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		
		break;
		//header("location:my_oc.php");
	}
}

function check_scoreun($score)
{
	if(strlen($score)>4)
	{
		echo "<br><br><br><br><center>This score is first of its kind. There must have been a mistake of some kind<br> If you think this is a valid score, please contact the admin.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		break;
		//header("location:my_oc.php");
	}
	else { echo " "; }
	
	$expr='/^\d{3,4}$/';
	if(preg_match($expr,$score))
	{
		echo " ";
	}
	else
	{
		echo "<br><br><br><br><center>This score is invalid.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		
		break;
		//header("location:my_oc.php");
	}
}

function check_scorespi($score)
{
	if(strlen($score)>8)
	{
		echo "<br><br><br><br><center>This score is first of its kind. There must have been a mistake of some kind<br> If you think this is a valid score, please contact the admin.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		break;
		//header("location:my_oc.php");
	}
	else { echo " "; }
	
	$expr='/^\d+(\.\d{1,3})?$/';
	if(preg_match($expr,$score))
	{
		echo " ";
	}
	else
	{
		echo "<br><br><br><br><center>This score is invalid.</center>";
		echo "<br><br><br><center><a href=\"my_oc.php\">Click here to submit the score again.</a></center>";
		
		break;
		//header("location:my_oc.php");
	}
}

?>
