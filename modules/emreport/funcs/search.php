<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_MOD_EMREPORT' ) ) die( 'Stop!!!' );
$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

// Get the search variable from URL

$var = filter_text_input('q', 'post', '');

// check for an empty string and display a message.
if ($var == "")
{
  $contents .= "<p>Please enter a search...</p>";
}

// Build SQL Query  
$query = "SELECT ten FROM " . NV_PREFIXLANG . "_" . $module_data . "_emreport WHERE cmnd = '%" . $var . "%'";

$result = $db->sql_query ($query);
$numrows = $db->sql_numrows($result);

// If we have no results

if ($numrows == 0)
{
  $contents .= "<h4>Results</h4>";
  $contents .= "<p>Sorry, your search: &quot;" . $var . "&quot; returned zero results</p>";
}

// now you can display the results returned
$row= $db->sql_fetchrow($result);
$title = $row["ten"];
$contents .= "$title" ;

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>