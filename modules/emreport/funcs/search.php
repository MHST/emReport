<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH;ThangLD)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if ( ! defined( 'NV_IS_MOD_EMREPORT' ) ) die( 'Stop!!!' );

$contents = 'Test search';

  // Get the search variable from URL
/*
$var = $_GET['q'] ;
$trimmed = trim($var); //trim whitespace from the stored variable

// check for an empty string and display a message.
if ($trimmed == "")
{
  $contents .= "<p>Please enter a search...</p>";
  exit;
}

// check for a search parameter
if (!isset($var))
{
  $contents .= "<p>We dont seem to have a search parameter!</p>";
  exit;
}

// Build SQL Query  
$query = "SELECT ten FROM " . NV_PREFIXLANG . "_" . $module_data . "_emreport WHERE cmnd = '%" . $trimmed . "%'";

$result = $db->sql_query ($query);
$numrows = $db->sql_numrows($result);

// If we have no results, offer a google search as an alternative

if ($numrows == 0)
{
  $contents .= "<h4>Results</h4>";
  $contents .= "<p>Sorry, your search: &quot;" . $trimmed . "&quot; returned zero results</p>";

// google
  $contents .= "<p><a href=\"http://www.google.com/search?q=" 
  . $trimmed . "\" target=\"_blank\" title=\"Look up 
  " . $trimmed . " on Google\">Click here</a> to try the 
  search on google</p>";
}

// display what the person searched for
$contents .= "<p>You searched for: &quot;" . $var . "&quot;</p>";

// begin to show results set
$contents .= "Results";

// now you can display the results returned
$row= $db->sql_fetchrow($result);
$title = $row["ten"];
$contents .= "$title" ;
*/
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>