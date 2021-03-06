<?php

/**
 * @Project emReport module
 * @Author K55CA UET (DuNT;LocBH)
 * @copyright 2012
 * @createdate 11/06/2012 8:34
 */

if (!defined('NV_SYSTEM')) die('Stop!!!');

$allow_func = array('main', 'search', 'view', 'crebook', 'examine', 'creuser', 'doctor_info', 'edit'); 

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

function getDoctorCMND($name) {
	global $module_data, $db;
	$query = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_bacsi` WHERE `ten` = '" . $name . "'";
	$result = $db->sql_query($query);
	$row = $db->sql_fetchrow($result);
	return $row['cmnd'];
}

function isValidCMND($number) {
    if (strlen($number) != 9) return false;
    return true;
}

function gen($gender) {
	global $lang_module;
	if ($gender == 'M') return $lang_module['male'];
	return $lang_module['female'];
}

?>