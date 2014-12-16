<?php
session_start();
require_once('bookmark_fns.php');

do_html_header('Create Categories');
check_valid_user();
do_html_left();
do_html_right(); 
/*if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo '<form method='post' action=''>
 	 	Category name: <input type='text' name='cat_name' />
 		Category description: <textarea name='cat_description' /></textarea>
 		<input type='submit' value='Add category' />
 	 </form>';
}
else
{*/ 
    
	$cat_name=mysql_real_escape_string($_POST['cat_name']);
	$cat_desc=mysql_real_escape_string($_POST['cat_description']);
    //the form has been posted, so save it
    $sql ="INSERT INTO categories(cat_name, cat_description) VALUES('".$cat_name."','".$cat_desc."')";
    $result = mysql_query($sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysql_error();
    }
    else
    {
        echo 'New category successfully added.';
    }
do_html_footer();
?>
