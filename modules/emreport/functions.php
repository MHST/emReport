<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if (!defined('NV_SYSTEM')) die('Stop!!!');

$allow_func = array('main', 'search', 'view', 'crebook', 'examine', 'creuser'); 

define('NV_IS_MOD_EMREPORT', true);

$get_array = explode('-',isset($array_op[0]) ? $array_op[0] : '');
$Lfunc = (isset($get_array[0])) ? $get_array[0] : 0;
$Lcmnd = (isset($get_array[1])) ? ($get_array[1]) : 0;

function isDoctor($name) {
	global $module_data, $db;
	$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_bacsi` WHERE `ten` = '" . $name . "'";
	$result = $db->sql_query ($query);
	$numrows = $db->sql_numrows($result);
	
	if ($numrows == 0) return false;
	return true;
}

function isCreated($name) {
	global $module_data, $db;
	$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `ten` = '" . $name . "'";
	$result = $db->sql_query ($query);
	$numrows = $db->sql_numrows($result);
	if ($numrows != 0) return true;
	return false;
}

function getCMND($name) {
	global $module_data, $db;
	$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_benhnhan` WHERE `ten` = '" . $name . "'";
	$result = $db->sql_query($query);
	$row = $db->sql_fetchrow($result);
	return $row['cmnd'];
}

function isValidCMND($number) {
    return preg_match('/^\d+$/', $number);
}

?>