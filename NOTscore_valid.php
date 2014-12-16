<?php
function score_valid($score,$link)
{
	if (!filled_out($score)) {
      //throw new Exception('Form not completely filled out.');
      echo "<br><br><br><br><br><br><br><center>There's something wrong with the score you have entered.
      <br><br><br><br><a href=\"my_oc.php\">Go back and change it.</a></center>";
      break;
    }
    // check URL format
    //if (strstr($link, 'http://') === false) {
     //  $link = 'http://'.$link;
    //}
	if($link!==NULL)
	{
    // check URL is valid
		
		if (!(@fopen($link, 'r'))) 
			{
		//throw new Exception('Not a valid URL.');
		echo "<br><br><br><br><br><br><br><center>There's something wrong with the link you have entered.<br><br><br><br><a href=\"my_oc.php\">Go back and change it.</a></center>";
		break;
			}
			else { return true;	}
	}
	else { return true;	}

}	
?>
